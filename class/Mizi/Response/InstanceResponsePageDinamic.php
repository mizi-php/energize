<?php

namespace Mizi\Response;

use Mizi\Code;
use Mizi\Front;
use Mizi\Request;

class InstanceResponsePageDinamic extends InstanceResponsePage
{
    protected static ?string $favicon = 'favicon.ico';
    protected static ?string $title = 'Energize';

    /** Modifica o favicon da pagina */
    static function favicon(string $favicon): void
    {
        self::$favicon = $favicon;
    }

    /** Modifica o titulo da página */
    static function title(string $title): void
    {
        self::$title = $title;
    }

    /** Prepara o objeto para ser enviado */
    protected function prepareContent(): void
    {
        if (!is_array($this->content) && !is_class($this->content, static::class)) {

            $title = self::$title;
            $favicon = url(self::$favicon);

            if (!str_starts_with(self::$template, '_page.'))
                self::$template = "_page." . self::$template;

            $templateKey = Code::on(self::$template);

            if (str_contains(self::$template, '#'))
                self::$template = explode('#', self::$template)[0];

            self::$template = self::$template ? self::$template : null;

            if (IS_AJAX) {
                $this->header('X-Energize-Template', $templateKey);
                $this->header('X-Energize-Title', $title);
                $this->header('X-Energize-Favicon', $favicon);

                $headerTemplateKey = Request::header('X-Energize-Template') ?? false;

                if ($headerTemplateKey && $headerTemplateKey != $templateKey) {
                    $content = view(self::$template, [
                        'content' => $this->content ?? '',
                        'command' => Front::getCommands()
                    ]);
                } else {
                    $content = ($this->content ?? '') . Front::getCommands();
                }
            } else {
                $content = view(self::$template, [
                    'content' => $this->content ?? '',
                    'command' => Front::getCommands()
                ]);
                $content = view('_page', [
                    'page' => [
                        'content' => $content,
                        'template' => $templateKey,
                        'title' => $title,
                        'favicon' => $favicon
                    ]
                ]);
            }
            $this->content($content);
        } else {
            parent::prepareContent();
        }
    }
}