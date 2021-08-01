#!/usr/bin/env bash

# Update composer to all directories/example projects.

for i in $(ls -d */)
do
  cd ${i%%/}
  echo "Updating composer in " ${i%%/}
  composer update
  echo "Composer updated successfully."
  cd ..
done
