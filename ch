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
    
    # Shahi_Bukhari:123
    if(count($argv)===2 and preg_match('/([a-zA-Z_]+)\:(\d+)/',$argv[1],$cocok)){
        #var_dump($cocok);
        $kitab = $cocok[1];
        $id = $cocok[2];
        $url = "http://api.carihadis.com/?kitab=$kitab&id=$id";
        if(function_exists('curl_version')){
            $ch = curl_init();
            curl_setopt_array($ch,[
                CURLOPT_URL=>$url,
                CURLOPT_RETURNTRANSFER=>true
                ]);
            $konten = curl_exec($ch);
            curl_close($ch);
        }else{
            $konten = file_get_contents($url);
        }
        if($konten === false)exit($merah."Eror, coba cek koneksi internet anda\n");
        $json = json_decode($konten,true);
        $data = $json['data'];
        if(count($data)<1) exit("Maaf, tidak ditemukan. Periksa kembali nama kitab dan nomor hadis".PHP_EOL);
        $data = $json['data']['1'];
        #$id = $data['id'];
        $nass = $data['nass'];
        $terjemah = $data['terjemah'];
        $terjemah = str_ireplace('&nbsp;','',strip_tags(br2nl($terjemah)));
        return print $kitab.': '.$id.PHP_EOL.$nass.PHP_EOL.$terjemah.PHP_EOL;
    }
    
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
    if(function_exists('curl_version')){
        $ch = curl_init();
        curl_setopt_array($ch,[
            CURLOPT_URL=>$url,
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_POSTFIELDS=>$data
            ]);
        $json = curl_exec($ch);
        curl_close($ch);
    }else{
        $data = http_build_query($data);
        $context = stream_context_create([
            'http'=>[
                'method'=>'POST',
                'header'=>'Content-Type:application/x-www-form-urlencoded',
                'content'=>$data
            ]
        ]);
        $json = file_get_contents($url, false, $context);
    }
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
        echo "Maaf, tidak ditemukan ".$merah.$katakunci.$putih.PHP_EOL;
    }
    
    
}else{
    $file = basename(__FILE__);
	
	
	$logo = explode('__halt_compiler();',file_get_contents(__FILE__))[2];
	system('clear');
	foreach(explode("\n",$logo) as $a){
	    echo $hijau.$a."\n";
	    sleep(1);
	}
	
	echo $biru."Keterangan:{$putih}
    1. Pastikan permission file ini sudah diubah menjadi executable dengan perintah {$hijau}chmod +x ".$file."{$putih} kemudian diletakkan di direktori PATH (cek direktori PATH dengan perintah {$hijau}echo \$PATH{$putih}).
    2. Cara menggunakan file ini, cukup ketik perintah {$hijau}".$file." {$kuning}[kata kunci]{$putih}. Contoh: {$hijau}".$file." {$kuning} puasa ramadhan{$putih}".PHP_EOL.PHP_EOL;
}

function br2nl( $input ) {
    return preg_replace('/<br\s?\/?>|<p\s?([^\>]+)\>/ius', "\n", str_replace("\n\n","",str_replace("\r","", htmlspecialchars_decode($input))));
}

__halt_compiler();
  ____           _ _   _           _ _
 / ___|__ _ _ __(_) | | | __ _  __| (_)___
| |   / _` | '__| | |_| |/ _` |/ _` | / __|
| |__| (_| | |  | |  _  | (_| | (_| | \__ \
 \____\__,_|_|  |_|_| |_|\__,_|\__,_|_|___/

