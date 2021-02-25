<?php

namespace Kapouet\Klaro\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Kapouet\Klaro\KlaroServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            KlaroServiceProvider::class,
        ];
    }
}
