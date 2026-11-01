#!/usr/bin/env bash
# Construiește dist/nextprod.zip (tema instalabilă din WordPress) din folderul nextprod/
set -euo pipefail
cd "$(dirname "$0")"
mkdir -p dist
rm -f dist/nextprod.zip
zip -qrX dist/nextprod.zip nextprod -x '*.DS_Store'
echo "OK: dist/nextprod.zip ($(du -h dist/nextprod.zip | cut -f1))"
