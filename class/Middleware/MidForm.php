<?php

namespace Middleware;

use Mizi\Input\InputException;
use Mizi\Middleware\InterfaceMiddleware;
use Mizi\Response\InstanceResponse;

/** Middleware form */
abstract class MidForm implements InterfaceMiddleware
{
    static function run(callable $next): mixed
    {
        try {
            return $next();
        } catch (InputException $e) {
            if ($e->getCode() == STS_FORBIDDEN) {
                alert('Formulário recusado', false);
                redirect();
            }
            return new InstanceResponse($e->getMessage(), STS_BAD_REQUEST);
        }
    }
}