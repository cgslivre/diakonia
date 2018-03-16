# Estrutura do _layout_

## Composição de _blades_
* `root.blade.php`: Elemento raiz. Carrega informações do `head` do HTML.
    * `app.blade.php`: Elemento fundamental da aplicação (sistema).
    * `auth.blade.php`: Layout raiz das páginas de autenticação (login, criação de novo usuário, _reset_ de senha.
    * `error.blade.php`: Layout raiz das páginas de erro.
    * `guest.blade.php`: Layout raiz das páginas acessadas por visitantes (não autenticados).
        * `retiro.blade.php`: Herda do layout acima e aplica estilos relacionados ao módulo de retiros (páginas que não requerem autenticação).
        * `musica.blade.php`: Herda do layout acima e aplica estilos relacionados ao módulo de escala de música (páginas que não requerem autenticação).
