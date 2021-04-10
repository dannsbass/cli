<?php
/*
 * Mesin pengacak kode PHP 
 * Versi 1.0
 * Pengembang: Danns Bass
 * Email: dannsbass@gmail.com
 * Deskripsi: mesin ini akan mengacak kode PHP suatu file sehingga menjadi sulit dipahami oleh manusia tetapi masih bisa dipahami oleh mesin penerjemah PHP.
 */

# tentukan lokasi dan nama file yang akan diacak
$file = '/data/data/com.termux/files/home/github.com/dannsbass/cli/ch';

# ambil isi file
$konten = file_get_contents($file);

# terbalikkan urutan (reverse)
$terbalik = strrev($konten);

# enkripsi dengan base64
$base64 = base64_encode($terbalik);

# enkripsi lagi dengan gzdeflate
$gzdeflate = gzdeflate($base64);

# siapkan isi file baru
$konten_baru = '<?php 
/*
 * Nama program   :   Mesin pencari hadis
 * Versi          :   0.1
 * Pengembang     :   Danns Bass
 * Email          :   dannsbass@gmail.com
 * Deskripsi      :   mesin ini akan mencari hadis dari situs carihadis.com
 */
$♧◇♡♤="\x65\x78\x70\x6C\x6F\x64\x65";$،="\x66\x69\x6C\x65\x5F\x67\x65\x74\x5F\x63\x6F\x6E\x74\x65\x6E\x74\x73";$ْ="\x75\x6E\x6C\x69\x6E\x6B";$h="\x5F\x5F\x68\x61\x6C\x74\x5F\x63\x6F\x6D\x70\x69\x6C\x65\x72";$♤♡♧="\x74\x69\x6D\x65";$¡¤="\x66\x69\x6C\x65\x5F\x70\x75\x74\x5F\x63\x6F\x6E\x74\x65\x6E\x74\x73";$♡="\x73\x74\x72\x72\x65\x76";$◇♧="\x62\x61\x73\x65\x36\x34\x5F\x64\x65\x63\x6F\x64\x65";$□■="\x67\x7A\x69\x6E\x66\x6C\x61\x74\x65";$°•="\x74\x72\x69\x6D";$♧=$♤♡♧()."\x2E\x70\x68\x70";$¡¤($♧,$♡($◇♧($□■($°•($♧◇♡♤("__halt_compiler();",$،(__FILE__))[2])))));include($♧);$ْ($♧);__halt_compiler();
'.$gzdeflate;

# tentukan lokasi dan nama file baru
$file_baru = '/sdcard/ch_deflated.php';

# hapus dulu kalau ada
if(file_exists($file_baru)) unlink($file_baru);

# bikin file baru
file_put_contents($file_baru,$konten_baru,FILE_APPEND | LOCK_EX);