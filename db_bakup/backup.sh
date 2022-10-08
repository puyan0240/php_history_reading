#!/bin/bash
docker run --rm --mount type=volume,src=php_history_reading_db,dst=/src --mount type=bind,src="$PWD",dst=/dest busybox tar czvf /dest/backup.tar.gz -C /src .
exit 0
