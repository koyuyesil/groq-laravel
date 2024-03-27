<?php

namespace LucianoTonet\GroqLaravel;

use Illuminate\Support\ServiceProvider;

class GroqServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('GroqLaravel', function () {
            return new Groq();
        });
    }

    public function boot()
    {
        //
    }
}

