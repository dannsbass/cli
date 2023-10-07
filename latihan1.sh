#!/bin/bash

echo "Ini adalah program sederhana untuk menghitung luas"
echo "Masukkan panjang: "
read PANJANG
echo "Masukkan lebar: "
read LEBAR
echo "Luasnya adalah: "
echo $(expr $PANJANG \* $LEBAR)
read