<?php

namespace Middleware;

use Mizi\Middleware\InterfaceMiddleware;
use Mizi\Response\InstanceResponsePageDinamic;

/** Middleware page */
abstract class MidPage implements InterfaceMiddleware
{
    static function run(callable $next): mixed
    {
        $return = $next();

        if (!is_class($return, InstanceResponse::class))
            $return = new InstanceResponsePageDinamic($return);

        return $return;
    }
}