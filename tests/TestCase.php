<?php

namespace Kapouet\Klaro\Tests;

use Kapouet\Klaro\KlaroServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            KlaroServiceProvider::class,
        ];
    }
}
