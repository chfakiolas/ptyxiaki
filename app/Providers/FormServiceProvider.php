<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Εδώ δηλώνω τα custom components από laravel collective μαζί με τις μεταβλητές που δέχεται το component
        Form::component('bsRadio', 'components.form.radio', ['display', 'name', 'value', 'attributes' => []]);
        Form::component('bsSubmit', 'components.form.submit', ['value' => 'submit', 'attributes' => []]);
        Form::component('hidden', 'components.form.hidden', ['name', 'value' => null, 'attributes' => []]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
