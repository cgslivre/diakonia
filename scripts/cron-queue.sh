#!/bin/bash
# Script executado pelo CRON que verifica se o daemon da fila está rodando
# caso contrário, inicia o processo.
PHP=/usr/bin/php
LARAVEL=/home/00448406160/projetos/Development/Diakonia
TMP_DIR=/tmp
flock -n $TMP_DIR/laravel_queues.lockfile $PHP $LARAVEL/artisan queue:listen --queue=emails
