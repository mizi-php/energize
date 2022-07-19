<?php

namespace Middleware\Energize;

use Mizi\Middleware\InterfaceMiddleware;
use Mizi\Response\InstanceResponse;
use Mizi\Response\InstanceResponsePageDinamic;

/** Middleware energize.response */
abstract class MidResponse implements InterfaceMiddleware
{
    static function run(callable $next): mixed
    {
        $return = $next();

        if (!is_class($return, InstanceResponse::class))
            $return = new InstanceResponsePageDinamic($return);

        return $return;
    }
}