<?php

namespace Mizi;

abstract class Front
{
    /** Retorna os comandos que devem ser executados no frontend */
    static function getCommands()
    {
        $commands = Session::get('#__command__') ?? [];

        $commands  = implode("\n", $commands);

        $commands = $commands ? "<div hidden>\n$commands\n</div>" : '';

        return $commands;
    }

    /** Adiciona comandos que serão executados na proxima atualização do frontent */
    static function command(string ...$commands): void
    {
        $sessionCommands = Session::get('#__command__') ?? [];

        foreach ($commands as $command)
            $sessionCommands[] = $command;

        Session::set('#__command__', $sessionCommands);
    }

    /** Comando de alerta */
    static function alert(string $content, string|bool $theme = 'positive', string $position = ''): void
    {
        if (is_bool($theme))
            $theme = $theme ? 'positive' : 'negative';
        command("<div alert='$theme' position='$position'>$content</div>");
    }

    /** Div HTML que abre ou fecha um aside no frontend */
    static function aside(?string $content = null, ?string $position = null): void
    {
        if (!$content)
            self::command("<div closeAside='true'></div>");
        else
            self::command("<div replace target='aside' position='$position'>$content</div>");
    }

    /** Carrega o conteúdo de URL ajax dentro de um elemento */
    static function load(string $url, string $target = '', string $position = ''): void
    {
        self::command("<div load='$url' target='$target' position='$position'></div>");
    }
}