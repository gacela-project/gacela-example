#!/usr/bin/env bash

# Update composer to all directories/example projects.

for i in $(ls -d */)
do
  cd ${i%%/}
  echo "Updating composer in " ${i%%/}
  composer update
  echo "Composer updated successfully."
  # TODO: run the "tests/test-script" and fail-fast in case of error
  # TODO: this way we can easily identify the failing and fix it manually
  cd ..
done
