#!/bin/bash
sudo -u postgres -H -- psql <<EOF
    DROP DATABASE distance_learning;
    CREATE DATABASE distance_learning;
EOF
php artisan migrate;
php artisan db:seed;