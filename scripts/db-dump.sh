#!/bin/bash
BACKUP_DIR="/home/goberti/backups"
mkdir -p "$BACKUP_DIR"
TIMESTAMP=$(date +"%Y-%m-%d-%H-%M")
docker compose exec -T db mysqldump -uroot -psecret tramites_db > "$BACKUP_DIR/$TIMESTAMP.sql"
