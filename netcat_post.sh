#!/bin/sh

# ini adalah script sederhana untuk memposting teks ke server 
# menggunakan tool busybox nc
# contoh: server beralamat di 192.168.8.148
# dan endpoint-nya adalah index.php
# dan di dalam index.php terdapat script untuk menangkap query q
# maka cara mengirimnya sebagi berikut:

POST_PATH="/index.php"
HOST=192.168.8.148
BODY="q=danns bass"
BODY_LEN=$( echo -n "${BODY}" | busybox wc -c )
echo -ne "POST ${POST_PATH} HTTP/1.0\r\nHost: ${HOST}\r\nContent-Type: application/x-www-form-urlencoded\r\nContent-Length: ${BODY_LEN}\r\n\r\n${BODY}" | \
busybox nc -i 3 ${HOST} 8080

# hasilnya kurang lebih begini:

# HTTP/1.0 200 OK
# Host: 192.168.8.148
# Date: Sat, 07 Oct 2023 17:05:21 GMT
# Connection: close
# X-Powered-By: PHP/8.2.10
# Content-type: text/html; charset=UTF-8

# danns bass