# ⚡ Energize ⚡ 

Base de frontend dinamico PHP + J

    composer require mizi/energize

---

> Esta é uma bilioteca que deve ser utilizada em conjunto com os aquivo JS e CSS do Energize. 
> Os aquivos completos podem ser encontrados [aqui](https://mundoizi.com/mizi)

---

### [Documentação](https://github.com/mizi-php/energize/tree/main/.doc)

- [_function](https://github.com/mizi-php/energize/tree/main/.doc/_function.md)
- [_view](https://github.com/mizi-php/energize/tree/main/.doc/_view.md)
- [front](https://github.com/mizi-php/energize/tree/main/.doc/front.md)
- [responsePageDinamic](https://github.com/mizi-php/energize/tree/main/.doc/responsePageDinamic.md)

---

## ⚡ Energize ⚡ 

Camada JS + CSS para complementar o funcionamento do ENERGIZE no Frontend

Para se utilizar o energize, deve-se criar um arquivo JS e importa-lo via tag, ou incorpora-lo dentro de uma view

O energize funciona de forma automatica, e para configurar seu funcionamento, utiliza-se o comando abaixo (em javascript)

    energize.action.register('css selector',action);

Sempre que um conteúdo for carregado de forma dinamica, o energize vai executar a varedura dos elementos da DOM, aplicando as actions

ex:

    energize.action.register('a[exemple]',(element)=>{
        element.addEventListener('click', (event) => {
            alert('exemplo funcionando')
        })
    })

O codigo acima vai fazer com que todos os elementos **a** com a propriedade **exemple** vai mostrar um alerta padrão quando clicado. 

---
## Comandos registrados
A instalação do energize, conta com alguns funcionamentos pre cadastrados. 
Os funcionamentos fornecidos de forma atuomatica são:

**[redirect]**
Realiza o redirecionamento para outra URL

    <div redirect='https://mundoizi.com' ></div>
    
    ou

    <div redirect ></div>

**[reload]**
Realiza o recarregamente do conteúdo da página

    <div reload='https://mundoizi.com' ></div>
    
    ou

    <div reload ></div>

**[href][target]**
Realiza uma chamada ajax e exibe seu conteúdo dentro de um elemento
    
    <a href='...' target='ID'>...</a>

**[copy][target]**
Copia o conteúdo de um elemento para dentro de outro elemento
    
    <a copy='ID' target='ID'>...</a>

**[load][target]**
Realiza uma chamada ajax e exibe seu conteúdo dentro de um elemento

    <div load='...'></div>
    
    ou
    
    <div load='...' target='ID'></div>

**[replace]**
Div que copia seu proprio conteúdo para dentro de outro elemento
    
    <div replace target='ID'>...</div>

**[toggle]**
Adiciona/remove uma classe de um elemento
    
    <div toggle='...' target='ID'></div>

**[alert]**
Abre um alerta

    <div alert='TYPE' position='POSITION'>...</div>

**TYPE:** | **null** | **'positive'** | **'negative'** |

**POSITION:** | **'top-left'** | **'top'** | **'top-right'** | **'center-left'** | **'center'** | **'center-right'** | **'bottom-left'** | **'bottom'** | **'bottom-right'** |

**[closeAside]**
Ação de fechar os asides abertos

    <div closeAside></div> //Fecha o aside quando clicado

    <div closeAside='true'></div> //Fecha o aside imediatamente

**form[target]**
Executa o submit do formulário via ajax

    <form target>
        ...
    </form>

**table[dinamic]**
Transforma uma tabla em uma tabela dinamica

    <table dinamic>
        ...
    </table>