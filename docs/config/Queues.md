# Filas (_queues_)

## Configuração inicial
Adicionar a variável de ambiente **`QUEUE_DRIVER`** no arquivo `.env`:

`QUEUE_DRIVER=database`

Rodar os comandos para criar a tabela de _jobs_:
```
php artisan queue:table
php artisan migrate
```
## Script de monitoramento das filas no Laravel

Faça uma cópia e ajuste o arquivo `scripts/cron-queue.sh`, alterando as variáveis:
- `PHP`: Local do binário do PHP
- `LARAVEL`: Local do projeto Laravel
- `TMP`: Pasta temporária

```
cp cron-queue.sh cron-queue-local.sh
```

## Adicione uma entrada no `crontab`



## Processo de _listen_ das filas

### Verificar o cron
```
crontab -l
grep CRON /var/log/syslog
```


