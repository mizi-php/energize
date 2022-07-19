<?php

namespace Mizi;

chdir(__DIR__);

require './vendor/autoload.php';

Router::add('favicon.ico', '!library/assets/favicon.ico');

Router::add('assets...', fn () => Assets::send('library/assets'));

Router::map('app');

Router::middleware('!assets', ['#response', '#error', '#form']);
Router::middleware('assets', ['#assets']);

Router::solve();