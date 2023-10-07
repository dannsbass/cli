#!/bin/bash
i=1
until [ ! $i -le 10 ];
do
echo $i
sleep 1
i=`expr $i + 1`
done
