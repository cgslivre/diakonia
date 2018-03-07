# Sistema Diakonia


## Ambiente Desenvolvimento

> Pré requisitos
> - Baixar o projeto
> - PHP >= 7.1 
> - NPM instalado globalmente
> - Gulp instalado globalmente
> - Composer configurado
> - MySQL server instalado
> - [MailCatcher instalado (uso local)](docs/config/MailCatcher.md)

### Instalar dependências
- Bower
```
bower update
```

- Gulp 4.0
```
sudo npm install -g "gulpjs/gulp#4.0"
```

- NPM
```
npm install
```

- Dependências PHP
```
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
composer install
```

- Configurar atalhos para `artisan` (PHP) no `.bashrc`
```
alias artisan='php artisan'
alias tinker='php artisan tinker'
```

- Criar tabelas e popular com dados básicos
> Necessita da base já criada e arquivo .env devidamente configurado
```
artisan migrate:install
artisan migrate --seed
```

- Criar usuário administrador do sistema
```
artisan auth:admin
```

