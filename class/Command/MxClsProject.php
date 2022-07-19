<?php

namespace Command;

use Mizi\Dir;
use Mizi\File;
use Mizi\Terminal;

abstract class MxClsProject extends Terminal
{
    protected static function execute()
    {
        Terminal::run('structure');
        Terminal::run('logo');

        $composer = json('composer');

        unset($composer['name']);
        unset($composer['description']);
        unset($composer['type']);
        unset($composer['license']);
        unset($composer['authors']);
        unset($composer['scripts']);

        json('composer', $composer, false);

        Terminal::run('composer');

        File::remove('README.md');
        Dir::remove('class/Command/', true);
        Dir::remove('.doc', true);
    }
}