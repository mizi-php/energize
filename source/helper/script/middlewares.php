<?php

use Mizi\Middleware;

Middleware::register('#assets', 'Energize.Assets');

Middleware::register('#error', 'Energize.Error');

Middleware::register('#form', 'Energize.form');

Middleware::register('#response', 'Energize.Response');