#!/bin/bash
# creates a time stamped backup in backups/db-backup-<datetime>.sql
# inspired by https://mariadb.com/kb/en/backup-and-restore-overview/

mkdir -p backups;
mysqldump -u masterarbeit -pMA2020 masterarbeit > backups/db-backup-$(date '+%Y%m%d-%H%M%S').sql
