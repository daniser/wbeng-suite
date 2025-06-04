<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [];
    }

    protected function getPackageAliases($app): array
    {
        return [];
    }

    protected function getEnvironmentSetUp($app): void
    {
        //
    }
}
