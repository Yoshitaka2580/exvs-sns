#!/bin/bash

set -eux

cd ~/exvs_sns
php artisan migrate --force
php artisan config:cache