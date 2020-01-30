#!/bin/sh

cd template/
rm tailwind/dist/main*
npm i
npm run prod
cd ..

rm -rf template/node_modules

# Stylesheet to be included inline
cat template/tailwind/dist/main.*.css > template/tailwind/compiled/css/xtg5_tailwind.css

# JavaScript to be deferred
cat template/tailwind/dist/main.js > template/tailwind/compiled/js/xtg5_tailwind.js

npm run build
