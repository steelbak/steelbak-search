<?php

namespace Steelbak\Search\Providers;

use Steelbak\Search\Application;

abstract class AbstractServiceProvider implements LifecycleProviderInterface
{
    public function register( Application $app ): void
    {
        // Override in concrete provider.
    }

    public function boot( Application $app ): void
    {
        // Override in concrete provider.
    }

    public function activate( Application $app ): void
    {
        // Override in concrete provider when activation tasks are required.
    }

    public function deactivate( Application $app ): void
    {
        // Override in concrete provider when deactivation tasks are required.
    }
}
