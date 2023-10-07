<?php
$zip = new ZipArchive;
$extract = $zip->open('tes-saja.zip');
if ($extract === TRUE) {
    $zip->extractTo('archive/');
    $zip->close();
    echo 'archive.zip berhasil di extract';
} else {
    echo 'Gagal';
}