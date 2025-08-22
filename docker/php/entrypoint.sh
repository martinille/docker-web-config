#!/usr/bin/env bash
set -Eeuoa pipefail

mkdir -p public/media
chmod -R 775 public/media

mkdir -p public/uploads
chmod -R 775 public/uploads

echo "starting php-fpm..."
exec php-fpm -F
