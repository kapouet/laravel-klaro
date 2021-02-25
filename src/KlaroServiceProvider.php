<?php

namespace Kapouet\Klaro;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class KlaroServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-klaro')
            ->hasConfigFile()
            ->hasRoute('klaro')
            ->hasTranslations()
            ->hasViews();
    }
}
