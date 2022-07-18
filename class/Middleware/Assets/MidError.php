<?php

namespace Middleware\Assets;

use Error;
use Exception;
use Mizi\Middleware\InterfaceMiddleware;
use Mizi\Response\InstanceResponse;

/** Middleware assets.error */
abstract class MidError implements InterfaceMiddleware
{
    static function run(callable $next): mixed
    {
        try {
            return $next();
        } catch (Exception | Error $e) {
            return new InstanceResponse('Arquivo não encontrado', 404);
        }
    }
}
