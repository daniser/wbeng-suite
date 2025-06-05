<?php

declare(strict_types=1);

namespace TTBooking\WBEngine;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use TTBooking\Stateful\ServiceManager;

class WBEngineServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->callAfterResolving('stateful', static function (ServiceManager $manager) {
            $manager->extend('wbeng', function (Container $container, array $config, string $name) use ($manager) {
                return new Service(
                    $serializer = $manager->createSerializer($config, $name),
                    $aliasResolver = $manager->createAliasResolver($config, $name),
                    $manager->createClient($config, $name, $serializer),
                    $manager->createRepository($config, $name, $serializer, $aliasResolver),
                    $container,
                );
            });
        });

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'wbeng-suite');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return list<string>
     */
    public function provides(): array
    {
        return ['stateful'];
    }
}
