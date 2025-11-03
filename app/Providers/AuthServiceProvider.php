<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * Check if the environment is set to 'local'. If so make that the prerequisites to locally use the application are in place.
     *
     */
    public function boot(): void
    {
        $this->registerPolicies();

        if (App::Environment() === 'local') {
            if (Schema::hasTable('users')) {
                if (User::where('cn', '=', config('saml2.mockUlcnUsername'))->exists()) {
                    $this->app['auth']->setUser(User::first());
                } else
                    echo('You must define your MOCK_ULCN_USERNAME_FOR_LOCAL_TESTING in the .env file and run `php artisan migrate:fresh --seed` to use this app locally.');
            }
        }
    }
}
