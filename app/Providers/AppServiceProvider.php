<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Les mappings des politiques pour l'application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Enregistrez les services d'authentification / autorisation.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Retirer les lignes liées à Passport
    }
}
