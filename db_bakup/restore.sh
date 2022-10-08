#!/bin/bash
docker run --rm --mount type=volume,src=php_history_reading_db,dst=/dest --mount type=bind,src="$PWD",dst=/src busybox tar xzf /src/backup.tar.gz -C /dest
exit 0
