### responsePageDinamic

Controla a página de resposta da requisição de forma Dinamica

> Esta classe extende a classe **[responsePageDinamic](https://github.com/mizi-php/server-front/blob/main/.doc/responsePage.md)** 

### Title
Defina um title para a página com o metodo estatico **title**

    InstanceResponsePage::title('file');

### Favicon
Defina um favicon para a página com o metodo estatico **favicon**

    InstanceResponsePage::favicon('file');

O favicion será adicionado utilizando um objeto de URL

### Estrutura HTML
Para que funcione corretamente, deve-se criar uma view na raiz da view **_page**
Estra estrutura deve conter todo o conteúdo imutavel da aplicação. Cabelaçhos, chamadas JS e CSS

Um exemplo de uma estrutura

    <!DOCTYPE html>
    <head>
        <title>[#page.title]</title>
        <link id="favicon" rel="icon" type="image/x-icon" href="[#page.favicon]">

        <link href='...' rel='stylesheet'>
        <script src="..." type="text/javascript"></script>

    <body template="[#page.template]">
        <div id='structure'>
            [#page.content]
        </div>
    </body>

    </html>

Esta estrutura recebe 4 parametros extras do prepare 

**page.title**: Titulo da página
**page.favicon**: Favicon da página
**page.template**: O template utilizado na página
**page.content**: O conteúdo da página

> A tag **body** sempre deve conter a propriedade **template** com o valor de **\[#page.template]**. Assim, o energize se encarrega de atualizar as partes relevantes do frontend

> A div com id **structure** vai receber todo o conteúdo dinamico da aplicação

### Templates
Assim como na classe **[responsePageDinamic](https://github.com/mizi-php/server-front/blob/main/.doc/**, os templates devem estar em subviews dentro da view **_page**.
Como a estrutura base já foi definida, os templates devem conter apenas as partes referentes ao conteúdo

Exemplo de um template

    <div>
        <div>
            conteúdo fixo do template
        </div>
        <div id='content'>
            [#content]
        </div>
    </div>

> A div com id **content** vai receber todo o conteúdo da página acessada
