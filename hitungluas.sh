#!/usr/bin/sh

echo "Panjang: "
read PANJANG
echo "Lebar: "
read LEBAR
echo "Luas: "
expr $PANJANG * $LEBAR

echo "tekan enter untuk keluar"
read 