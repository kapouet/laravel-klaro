<?php

namespace Kapouet\Klaro;

use Exception;
use Illuminate\Support\Str;

class KlaroMix
{
    public function __invoke(string $path, string $packageName = '')
    {
        static $manifests = [];

        if (! Str::startsWith($path, '/')) {
            $path = "/{$path}";
        }

        if ($packageName && ! Str::startsWith($packageName, '/')) {
            $packageName = "/{$packageName}";
        }

        $manifestPath = __DIR__ . '/../dist/mix-manifest.json';

        if (! isset($manifests[$manifestPath])) {
            if (! is_file($manifestPath)) {
                throw new Exception('The Klaro Mix manifest dost not exist.');
            }

            $manifests[$manifestPath] = json_decode(file_get_contents($manifestPath), true);
        }

        $manifest = $manifests[$manifestPath];

        if (! isset($manifest[$path])) {
            $exception = new Exception("Unable to locale Klaro Mix file: {$path}.");

            if (! app('config')->get('app.debug')) {
                report($exception);

                return $path;
            }

            throw $exception;
        }

        return $packageName . $manifest[$path];
    }
}
