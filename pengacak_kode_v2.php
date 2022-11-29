<?php
/*
 * Mesin pengacak kode PHP 
 * Versi 2
 * Pengembang: Danns Bass
 * Email: dannsbass@gmail.com
 * Deskripsi: mesin ini akan mengacak kode PHP suatu file sehingga menjadi sulit dipahami oleh manusia tetapi masih bisa dipahami oleh mesin penerjemah PHP. Metode yang digunakan hanya satu saja, yaitu gzcompress. Kalau mau lebih rumit, bisa dikembangkan sendiri dengan kombinasi fungsi-fungsi lain seperti gzdeflate atau gzencode, dll.
 */
 
$sumber = 'sumber.php'; # file yang akan diacak
$output = 'output.php'; # file hasil acakan

$konten = file_get_contents($sumber);
$konten = str_replace('<?php','',$konten);
$konten = gzcompress($konten);
$konten = str_replace('"','\"',$konten);
$konten = str_replace('$','\$',$konten);

$konten = trim('

<?php /*

Deskripsi File
By: Author
Email: you@mail.com
Github: username

*/$ًًٌٍُِّْ="'.$konten.'";$ْ="\x67\x7A\x75\x6E\x63\x6F\x6D\x70\x72\x65\x73\x73";eval($ْ($ًًٌٍُِّْ));

');
file_put_contents($output,$konten);
include($output);
