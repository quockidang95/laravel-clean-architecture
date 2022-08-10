<?php

namespace App\Domain\Users\Providers;

use App\Infrastructure\Abstracts\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    protected string $alias = 'users';

    protected bool $hasMigrations = false;

    protected bool $hasTranslations = false;

    protected bool $hasPolicies = false;

    protected array $providers = [
        RouteServiceProvider::class,
        RepositoryServiceProvider::class
    ];
}
