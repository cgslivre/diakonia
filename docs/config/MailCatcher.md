# Instalação e Configuração do MailChatcher

- https://mailcatcher.me/
## Instalação do MailCatcher

```
sudo apt-get install ruby-dev
sudo apt-get install libsqlite3-dev
sudo gem install mailcatcher
```
Alterar a configuração no `php.ini`:
```
sendmail_path = /usr/bin/env catchmail -f some@from.address
```

## Arquivo de configuração (`.env`)
```
MAIL_FROM_ADDRESS="app@diakonia.discipulosbsb.com"
MAIL_FROM_NAME="Diakonia - discipulosbsb.com"
MAIL_DRIVER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_ENCRYPTION=''
```
