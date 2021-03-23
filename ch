#!/usr/bin/env php
<?php

if(PHP_SAPI != 'cli') exit('File ini hanya bisa diakses melalui PHP-CLI');

//warna
$hitam="\033[0;30m";
$merah="\033[0;31m";
$hijau="\033[0;32m";
$putih="\033[0;37m";
$birumuda="\033[0;36m";
$ungu="\033[0;35m";
$biru="\033[0;34m";
$kuning="\033[0;33m";

if(isset($argv[1])){
    if(count($argv)>2){
        array_shift($argv);
        $katakunci = implode(' ',$argv);
    }else{
        $katakunci = $argv[1];
    }
    
    $url = "http://api.carihadis.com";
    $data = [
        'q'=>$katakunci
    ];
    $data = http_build_query($data);
    $context = [
        'http'=>[
            'method'=>'POST',
            'header'=>'Content-Type:application/x-www-form-urlencoded',
            'content'=>$data
        ]
    ];
    $context = stream_context_create($context);
    $json = file_get_contents($url, false, $context);
    $array = json_decode($json,true);
    if($array['data']!=null){
        $data = $array['data'];
        $hasil = '';
        foreach($data as $key=>$d){
            $kitab = $data[$key]['kitab'];
            $id = $data[$key]['id'];
            $no = '';
            foreach($id as $k=>$i){
                $no .= $i;
                if(count($id)>($k+1)){
                    $no .= ', ';
                }
            }
            $hasil .= $kitab.': '.$no."\n";
        }
        echo $hasil;
        #print(json_encode($data,JSON_PRETTY_PRINT));
    }
    # if data is null
    else{
        echo "Maaf, tidak ditemukan ".$merah.$argv[1].$putih.PHP_EOL;
    }
    
    
}else{
    $file = basename(__FILE__);
	echo $hijau.explode('__halt_compiler();',file_get_contents(__FILE__))[2].$biru."Keterangan:{$putih}
    1. Pastikan permission file ini sudah diubah menjadi executable dengan perintah {$hijau}chmod +x ".$file."{$putih} kemudian diletakkan di direktori PATH (cek direktori PATH dengan perintah {$hijau}echo \$PATH{$putih}).
    2. Cara menggunakan file ini, cukup ketik perintah {$hijau}".$file." {$kuning}[kata kunci]{$putih}. Contoh: {$hijau}".$file." {$kuning} puasa ramadhan{$putih}".PHP_EOL.PHP_EOL;
}

__halt_compiler();
  ____           _ _   _           _ _
 / ___|__ _ _ __(_) | | | __ _  __| (_)___
| |   / _` | '__| | |_| |/ _` |/ _` | / __|
| |__| (_| | |  | |  _  | (_| | (_| | \__ \
 \____\__,_|_|  |_|_| |_|\__,_|\__,_|_|___/

