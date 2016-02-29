<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        Validator::extend('accepted_title', function ($attribute, $value, $parameters) {
            /*$accepted_title = [
                'jigar',
                'joy'
            ];*/
            /*$is_accepted = in_array($value, $accepted_title);*/
            return preg_match('/^[\pL\s]+$/u', $value);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


    }
}
