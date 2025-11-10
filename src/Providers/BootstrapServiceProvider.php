<?php

namespace Steelbak\Search\Providers;

use Steelbak\Search\Application;

class BootstrapServiceProvider extends AbstractServiceProvider
{
    public function boot( Application $app ): void
    {
        add_action( 'plugins_loaded', [ $this, 'loadTextDomain' ] );
    }

    public function loadTextDomain(): void
    {
        load_plugin_textdomain( 'steelbak-search', false, dirname( plugin_basename( STEELBAK_SEARCH_PLUGIN_FILE ) ) . '/languages' );
    }
}
