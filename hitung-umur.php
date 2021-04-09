<?php
# Cara menghitung umur
# misalkan anda lahir pada 30 September 1986
#$input = "1986-09-30";
$th = readline('tahun berapa kamu lahir? ');
cekInput($th);
$bl = readline('bulan ke berapa? [1-12]');
cekInput($bl);
$hr = readline('tanggal berapa? ');
cekInput($hr);
function cekInput($input){
  if(!is_numeric($input))exit('maaf, anda salah memasukkan data, silahkan ulangi lagi'.PHP_EOL);
}
$input ="{$th}-{$bl}-{$hr}";
$ttl = new DateTime($input);
$now = new DateTime("now");
$selisih = $ttl -> diff ($now);
$tahun = $selisih -> y;
$bulan = $selisih -> m;
$hari = $selisih -> d;
$umur = "umur kamu sekarang $tahun tahun, $bulan bulan, $hari hari\n";
echo $umur;