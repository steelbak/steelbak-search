<?php

namespace Steelbak\Search\Providers;

use Steelbak\Search\Application;

interface ServiceProviderInterface
{
    public function register( Application $app ): void;

    public function boot( Application $app ): void;
}
