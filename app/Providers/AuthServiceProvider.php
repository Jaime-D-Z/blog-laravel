<?php

namespace App\Providers;

use App\Models\Post;            // Importa tu Modelo
use App\Policies\PostPolicy;    // Importa tu Policy
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 🛡️ Registro manual de la Policy
        Gate::policy(Post::class, PostPolicy::class);
    }
}
