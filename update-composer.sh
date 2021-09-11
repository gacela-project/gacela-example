#!/usr/bin/env bash

set -e

# Update composer to all directories/example projects.
PROJECT_EXAMPLES=$(ls -d */)

for i in $PROJECT_EXAMPLES
do
  cd ${i%%/}
  echo "Updating composer in " ${i%%/}
  composer update
  echo "Composer updated successfully."
  cd ..
done

echo "___________________________________"
clear
echo "==================================="

# Run all example projects to verify that they work as expected
for i in $PROJECT_EXAMPLES
do
  cd ${i}
  echo "-----------------------------------"
  echo "Running example:" ${i%%/}
  php app.php
  cd ..
done
