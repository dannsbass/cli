#!/usr/bin/bash

echo "Siapa namamu?"
read NAMA
# echo "Namamu adalah $NAMA"
if [ $NAMA == 'Danns' ];
then
echo "Aku suka namamu"
else
echo "Aku tidak suka namamu"
fi
echo "tekan enter untuk keluar"
read 