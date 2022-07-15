<?php

use Mizi\Front;
use Mizi\Response\InstanceResponseRedirect;

if (!function_exists('redirect')) {

    /** Redireciona o frontend para uma URL */
    function redirect(...$params): never
    {
        if (IS_AJAX) {
            $url = count($params) ? url(...$params) : '';
            die("<div redirect='$url'></div>");
        } else {
            $url = count($params) ? url(...$params) : url(true);
            (new InstanceResponseRedirect($url))->send();
        }
    }
}

if (!function_exists('reload')) {

    /** Recarrega do conteúdo do frontend */
    function reload(...$params): never
    {
        if (IS_AJAX) {
            $url = count($params) ? url(...$params) : '';
            die("<div reload='$url'></div>");
        } else {
            $url = count($params) ? url(...$params) : url(true);
            (new InstanceResponseRedirect($url))->send();
        }
    }
}

if (!function_exists('command')) {

    /** Adiciona comandos para o frontent */
    function command(string ...$commands): void
    {
        Front::command(...func_get_args());
    }
}

if (!function_exists('alert')) {

    /** Adiciona uma div alert aos comandos do frontent */
    function alert(string $content, string|bool $theme = '', ?string $position = null): void
    {
        Front::alert(...func_get_args());
    }
}

if (!function_exists('aside')) {

    /** Div HTML que abre ou fecha um aside no frontend */
    function aside(?string $content = null, ?string $position = null): void
    {
        Front::aside(...func_get_args());
    }
}