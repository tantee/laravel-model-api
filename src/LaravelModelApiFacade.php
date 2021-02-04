<?php

namespace TaNteE\LaravelModelApi;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TaNteE\LaravelModelApi\LaravelModelApi
 */
class LaravelModelApiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-model-api';
    }
}
