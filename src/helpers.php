<?php

use Kapouet\Klaro\KlaroMix;

if (! function_exists('klaro_mix')) {
    /**
     * @param string $path
     *
     * @return string
     * @throws \Exception
     */
    function klaro_mix(string $path): string
    {
        return app(KlaroMix::class)(...func_get_args());
    }
}
