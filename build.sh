#!/usr/bin/env bash
# Construiește tema instalabilă din folderul nextprod/:
#   dist/nextprod.zip          – nume fix, folosit de previzualizarea Playground
#   dist/nextprod-vX.Y.zip     – aceeași temă, cu versiunea în nume (de urcat pe hosting)
set -euo pipefail
cd "$(dirname "$0")"
VER=$(grep -m1 '^Version:' nextprod/style.css | awk '{print $2}')
mkdir -p dist
rm -f dist/nextprod*.zip
zip -qrX dist/nextprod.zip nextprod -x '*.DS_Store'
cp dist/nextprod.zip "dist/nextprod-v$VER.zip"
echo "OK: dist/nextprod.zip + dist/nextprod-v$VER.zip ($(du -h dist/nextprod.zip | cut -f1))"
