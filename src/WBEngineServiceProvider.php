<?php

declare(strict_types=1);

namespace TTBooking\WBEngine;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use TTBooking\Stateful\SerializerManager;
use TTBooking\Stateful\ServiceManager;
use TTBooking\WBEngine\Serializer\SerializerFactory;

class WBEngineServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->callAfterResolving('stateful', static function (ServiceManager $manager) {
            $manager->extend('wbeng', function (Container $container, array $config, string $name) {
                return $this->cloneContainer($config, $name)->make(Service::class, compact('name'));
            });
        });

        $this->callAfterResolving('stateful-serializer', static function (SerializerManager $manager) {
            $manager->extend('wbeng', fn () => SerializerFactory::createSerializer());
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
        return ['stateful', 'stateful-serializer'];
    }
}
