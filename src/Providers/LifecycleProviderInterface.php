<?php

namespace Steelbak\Search\Providers;

use Steelbak\Search\Application;

interface LifecycleProviderInterface extends ServiceProviderInterface
{
    public function activate( Application $app ): void;

    public function deactivate( Application $app ): void;
}
