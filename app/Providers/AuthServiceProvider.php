<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

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

        // Définir la durée de vie des jetons
        Passport::tokensExpireIn(now()->addMinutes(5)); // 5 minutes

        // Si vous avez besoin d'enregistrer des routes spécifiques, vous pouvez le faire ici
        // Par exemple :
        // Passport::routes(function ($router) {
        //     $router->forAccessTokens();
        //     $router->forPersonalAccessTokens();
        //     $router->forTransientTokens();
        // });
    }
}