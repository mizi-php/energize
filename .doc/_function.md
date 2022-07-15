### Helper

**redirect**: Redireciona o frontend para uma URL
    
    redirect(...$params): never

**reload**: Recarrega do conteúdo do frontend
    
    reload(...$params): never

---

**command**: Adiciona comandos para o frontent
    
    command(string ...$commands): void

---

**alert**: Adiciona uma div alert aos comandos do frontent
    
    alert(string $content, string|bool $theme = '', ?string $position = null): void

**aside**: Div HTML que abre ou fecha um aside no frontend
    
    aside(?string $content = null, ?string $position = null): void
