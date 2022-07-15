### front

Cria e armazena comandos que são enviados junto do próximo conteudo do frontend

**getCommands** Retorna os comandos que devem ser executados no frontend
    
    Front::getCommands(): string

**command** Adiciona comandos que serão executados na proxima atualização do frontent
    
    Front::command(string ...$commands): void

**alert** Comando de alerta
    
    Front::alert(string $content, string|bool $theme = 'positive', string $position = ''): void

**aside** Div HTML que abre ou fecha um aside no frontend
    
    Front::aside(?string $content = null, ?string $position = null): void

**load** Carrega o conteúdo de URL ajax dentro de um elemento
    
    Front::load(string $url, string $target = '', string $position = ''): void

**set_value** Comando de alteração de valor
    
    Front::set_value(string $target, string $value = ''): void