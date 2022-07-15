<?php

namespace Middleware\Error;

use Error;
use Exception;
use Mizi\Middleware\InterfaceMiddleware;

/** Middleware error */
abstract class MidError implements InterfaceMiddleware
{
    static function run(callable $next): mixed
    {
        try {
            return $next();
        } catch (Exception | Error $e) {
            $url = url('error', $e->getCode() ? $e->getCode() : 500);
            redirect($url);
        }
    }
}