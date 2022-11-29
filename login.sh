#!/data/data/com.termux/files/usr/bin/env bash

clear;
echo
passwod=
user="user"

handle_ctrl_c() {
  if [[ $EUID != 0 ]]; then
    sudo pkill com.termux
  else pkill com.termux
  fi
}
trap "handle_ctrl_c" 2

while true; do
  read -s -p  "masukkan password: " passwod
  if [[ $passwod != "rahasia123" ]]; then
    echo "password salah!"; sleep 1; clear;
  else
    break
  fi
done; 
clear
