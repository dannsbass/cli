<?php
$hijau = "\033[0;32m";
$putih = "\033[0;37m";
function ketik($teks){
  $pecah = str_split($teks);
  foreach ($pecah as $huruf){
    echo $huruf;
    usleep(50000);
  }
}
function clear(){
  system('clear');
}
function termux(){
  global $hijau,$putih;
  echo "\n";
  echo $hijau.'~ '.$putih.'$ ';
}
sleep(3);
clear();
ketik('Assalamualaikum teman-teman
Kali ini kita akan belajar membuat teks berjalan dengan bahasa PHP
Kalau kalian belum menginstal PHP, instal dulu dengan perintah:

');
sleep(3);
ketik('pkg up
');
sleep(2);
ketik('pkg install php
');
sleep(3);
ketik('
Kalau sudah, sekarang kita mulai...');
sleep(5);
clear();
termux();
sleep(3);
ketik('cat > teksberjalan.php
');
sleep(3);
ketik('<?php
$teks = \'Bismillah percobaan\';
$pecah = str_split($teks);
foreach($pecah as $huruf){
  echo $huruf;
  usleep(80000);
}
');
sleep(3);
echo '^C';
termux();
sleep(5);
ketik('php teksberjalan.php');
sleep(3);
ketik('
Bismillah percobaan');
termux();
sleep(3);
ketik('Kalau mau tau full code-nya, seperti ini:');
sleep(3);
clear();
ketik(file_get_contents(__FILE__));
readline();
