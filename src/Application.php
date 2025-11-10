<?php

namespace Steelbak\Search;

use Steelbak\Search\Providers\LifecycleProviderInterface;
use Steelbak\Search\Providers\ServiceProviderInterface;

/**
 * Primary plugin container.
 */
class Application
{
    private static ?self $instance = null;

    private bool $booted = false;

    /**
     * @var array<class-string<ServiceProviderInterface>>
     */
    private array $providerClasses = [];

    /**
     * @var array<class-string<ServiceProviderInterface>, ServiceProviderInterface>
     */
    private array $resolvedProviders = [];

    private function __construct()
    {
        $this->registerDefaultProviders();
        $this->registerLifecycleHooks();
    }

    public static function instance(): self
    {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function boot(): void
    {
        if ( $this->booted ) {
            return;
        }

        $this->resolveProviders();

        foreach ( $this->resolvedProviders as $provider ) {
            $provider->boot( $this );
        }

        $this->booted = true;

        do_action( 'steelbak_search/booted', $this );
    }

    public function registerProvider( string $class ): void
    {
        if ( ! is_subclass_of( $class, ServiceProviderInterface::class ) ) {
            throw new \InvalidArgumentException( sprintf( 'Service provider %s must implement %s.', $class, ServiceProviderInterface::class ) );
        }

        if ( ! in_array( $class, $this->providerClasses, true ) ) {
            $this->providerClasses[] = $class;
        }
    }

    /**
     * Returns all resolved service providers.
     *
     * @return array<int, ServiceProviderInterface>
     */
    public function providers(): array
    {
        $this->resolveProviders();

        return array_values( $this->resolvedProviders );
    }

    public static function activate(): void
    {
        $instance = self::instance();
        $instance->resolveProviders();

        foreach ( $instance->resolvedProviders as $provider ) {
            if ( $provider instanceof LifecycleProviderInterface ) {
                $provider->activate( $instance );
            }
        }
    }

    public static function deactivate(): void
    {
        if ( null === self::$instance ) {
            return;
        }

        $instance = self::$instance;
        $instance->resolveProviders();

        foreach ( $instance->resolvedProviders as $provider ) {
            if ( $provider instanceof LifecycleProviderInterface ) {
                $provider->deactivate( $instance );
            }
        }
    }

    private function registerLifecycleHooks(): void
    {
        if ( function_exists( 'register_activation_hook' ) ) {
            register_activation_hook( STEELBAK_SEARCH_PLUGIN_FILE, [ self::class, 'activate' ] );
        }

        if ( function_exists( 'register_deactivation_hook' ) ) {
            register_deactivation_hook( STEELBAK_SEARCH_PLUGIN_FILE, [ self::class, 'deactivate' ] );
        }
    }

    private function registerDefaultProviders(): void
    {
        $this->registerProvider( Providers\BootstrapServiceProvider::class );
    }

    private function resolveProviders(): void
    {
        foreach ( $this->providerClasses as $class ) {
            if ( isset( $this->resolvedProviders[ $class ] ) ) {
                continue;
            }

            $provider = new $class();

            $provider->register( $this );

            $this->resolvedProviders[ $class ] = $provider;
        }
    }
}
