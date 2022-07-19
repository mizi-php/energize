<?php

namespace Middleware\Energize;

use Error;
use Exception;
use Mizi\Middleware\InterfaceMiddleware;
use Mizi\Response\InstanceResponse;

/** Middleware energize.assets */
abstract class MidAssets implements InterfaceMiddleware
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