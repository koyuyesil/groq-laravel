<?php

namespace LucianoTonet\GroqLaravel\Tests\Feature;

use Orchestra\Testbench\TestCase;
use LucianoTonet\GroqLaravel\Facades\Groq;
use LucianoTonet\GroqLaravel\GroqServiceProvider;
use Illuminate\Support\Facades\Storage;

class RealApiTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [GroqServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Groq' => Groq::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Carregar variáveis de ambiente do arquivo .env
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
        $dotenv->load();
    }

    public function testRealApiCall()
    {
        $response = Groq::chat()->completions()->create([
            'model' => 'llama-3.1-8b-instant', // Adicionar o modelo
            'messages' => [
                ['role' => 'user', 'content' => 'Olá, mundo!'],
            ],
        ]);

        $this->assertArrayHasKey('choices', $response);
        $this->assertNotEmpty($response['choices']);
    }
}