<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
      // $this->registerNotePolicies();

    }
//    public function registerNotePolicies()
//    {
//        Gate::define('create-note', function ($user) {
//
//           return $user->hasAccess(['create-note']);
//        });
//        Gate::define('update-note', function ($user, Note $note) {
//            return $user->hasAccess(['update-note']) or $user->id == $note->user_id;
//        });
//        Gate::define('publish-note', function ($user) {
//            return $user->hasAccess(['publish-note']);
//        });
//        Gate::define('see-all-drafts', function ($user) {
//            return $user->inRole('editor');
//        });
//    }
}
