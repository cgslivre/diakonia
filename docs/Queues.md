# Filas (_queues_)

## Configuração inicial
Adicionar a variável de ambiente **`QUEUE_DRIVER`** no arquivo `.env`:

`QUEUE_DRIVER=database`

Rodar os comandos para criar a tabela de _jobs_:
```
php artisan queue:table
php artisan migrate
```

## Processo de _listen_ das filas

### Verificar o cron
`crontab -l`
