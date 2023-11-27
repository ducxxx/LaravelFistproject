<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('valid_full_name', function ($attribute, $value, $parameters, $validator) {
            // Define a regex pattern that allows only letters, spaces, and hyphens in each word
            $pattern = '/^[a-zA-Z]+(?:-[a-zA-Z]+)*(?:\s[a-zA-Z]+(?:-[a-zA-Z]+)*)*$/';

            return preg_match($pattern, $value);
        });

        Validator::replacer('valid_full_name', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, $message);
        });
    }
}
