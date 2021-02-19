#!/bin/bash

cd /var/www/Masterarbeit2020;
mkdir -p csv
rm -f csv/Masterarbeit2020.csv
mysql -u masterarbeit -pMA2020 masterarbeit < db/export_csv.sql
