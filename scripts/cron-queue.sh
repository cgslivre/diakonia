# Script executado pelo CRON que verifica se o daemon da fila está rodando
# caso contrário, inicia o processo.
flock -n /tmp/latavel_queues.lockfile /usr/bin/php /path/to/laravel/artisan queue:listen
