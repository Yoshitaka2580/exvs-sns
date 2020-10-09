#!/bin/bash

set -eux

cd ~/exvs-sns
php artisan migrate --force
php artisan config:cache