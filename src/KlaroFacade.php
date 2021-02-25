<?php

namespace Kapouet\Klaro;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kapouet\Klaro\Klaro
 */
class KlaroFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-klaro';
    }
}
