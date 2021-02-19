#!/bin/bash

cd /var/www/Masterarbeit2020;
mysql -u masterarbeit -pMA2020 masterarbeit < db/setup_db.sql
