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
/*
$ttl = date("Y-m-d",strtotime("2000-09-30"));
$sekarang = date("Y-m-d",time());
$umur = $sekarang - $ttl;
echo $umur;
/*
function kalkulator($n) {
    if ($n == 0) {
        return 1;
    } else {
        return kalkulator($n -1) * $n;
    }
}
var_dump(kalkulator(5));
/* 
<script>
    var content = 'Ini adalah isi file';
    var namafile = 'namafile.txt';
    var tipe = 'text/plain';
    
    setTimeout("create(content, namafile, tipe)");
    
    function create(text, name, type) {
        var dlbtn = document.getElementById("dlbtn");
        var file = new Blob([text], {type: type});
        dlbtn.href = URL.createObjectURL(file);
        dlbtn.download = name;
}
</script>
<a href="javascript:void(0)" id="dlbtn"><button>click here to download your file</button></a>

<?php /*
<script>
    function download(text, name, type) {
        var a = document.getElementById("a");
        var file = new Blob([text], {type: type});
        a.href = URL.createObjectURL(file);
        a.download = name;
}
</script>
<a href="" id="a">click here to download your file</a>
<button onclick="download('file text', 'myfilename.txt', 'text/plain')">Create file</button>

<?php
/*
$a = json_decode(json_encode(['pertama'=>'agus','kedua'=>'agung','ketiga'=>'andi','ahsin']));
#var_dump($a);/*
echo $a -> pertama;
/*
$token = '1441817738:AAEYjKCGlbdK0POwtaIJJQAw58aTh8h3EOE';#linux

$chat_id = 685631733;

$file = 'Download/ahmadalfalah.000webhostapp.com.zip';
if(file_exists($file))
echo unduh($file);
else echo "$file gak ada";

function unduh($file){
    global $token;
    global $chat_id;
    $file = new CURLFile(realpath($file));
    $headers = ["Content-Type" => "multipart/form-data"];
    $postfields = ["chat_id" => $chat_id,"document" =>$file];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://api.telegram.org/bot$token/sendDocument");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $text = curl_exec($ch);
    curl_close ($ch);
    return $text;
}

function sedot($url,$postfields=[],$headers=[]){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $html = curl_exec($ch);
    curl_close ($ch);
    return $html;#string
}

/*
function cek($teks){
    echo $teks."\n";
}
$text = readline('Text: ');
$word = urlencode(iconv('utf-8', 'windows-1256//TRANSLIT//IGNORE', $text));
    
        $postfields = "field=btitle&getword=$word";
                
        $url = "https://waqfeya.com/search.php";
                
        $headers = ["Content-Type"=> "text/html; charset=windows-1256"];
                
        $html = sedothtml($url,$postfields,$headers);#string
        #$array = [];
        #$array_waqfeya = saring($html);#array [$bid => $judul_buku]
        
        /*
        foreach ($array_waqfeya as $bid => $judul_buku){
            echo $bid."\n".$judul_buku."\n\n";
        }
        */
        /*
        preg_match_all('/\&st=(.*)\&field/i',$html,$pages);
        
        $array_mentah = [];
        if(count($pages[1])>0){
            foreach ($pages[1] as $k => $no){
                $postfields = "st=$no&field=btitle&getword=$word";
                $html = sedothtml($url,$postfields,$headers);
                $array_mentah[] = saring($html);#array [$bid => $judul_buku]
            }
        }
        
        
        $array_waqfeya2 = [];
        foreach ($array_mentah as $array_setengah_matang){
            foreach ($array_setengah_matang as $bid => $link){
                $array_waqfeya2[] = [$bid=> $link];
            }
        }
        #var_dump($array_waqfeya);
        $array_waqfeya3 = [];
        foreach($array_waqfeya2 as $array){
            foreach($array as $bid=>$judul){
                $array_waqfeya3[$bid] = $judul;
            }
        }
        var_dump($array_waqfeya3);
        /*
        $gabungan = array_merge($array_waqfeya,$array_waqfeya2);
        $hasil_wqf = '';
        if(count($gabungan)>0){
            
            $no = 1;
            foreach ($gabungan as $bid => $nilai){
                cek("<a href='https://waqfeya.com/book.php?bid=".$bid."'>$nilai</a>");
                #$hasil_wqf .= "$no. <a href='https://waqfeya.com/book.php?bid=".$bid."'>$nilai</a><br>\n";
                $no++;
            }
            #bikin_file("waqfeya.com",count($gabungan),$hasil_wqf);#bikin_file($nama_file,$jumlah_hasil,$konten)
            
        }
        
        /**/
        /*
        function sedothtml($url,$postfields=[],$headers=[]){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, 1); 
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $html = curl_exec($ch);
            curl_close ($ch);
            return $html;#string
        }
        */
        /*
        function saring($html){
            #preg_match_all('/<ul><li>(.*)<\/li><\/ul>/i',$html,$contents);#menangkap seluruh konten hasil pencarian
            
            preg_match_all('/<a href=\'book\.php\?bid=(.*)\'>(.*)<\/a>/i',$html,$contents);#mengambil linknya saja, $contents[0] adalah linknya, $contents[1] adalah bid-nya, sedangkan $contents[2] adalah judul bukunya.
            
            //var_dump($contents);
            
            $bid = [];
            
            if(count($contents[1])>0){
                
                #$teks = "Silahkan klik link di bawah ini:\n\n";
            	
            	foreach($contents[1] as $content){
            	    $bid[] = "".strip_tags(str_replace("&nbsp;","\n",$content),"<a><b><i><u>");
            	}
            }
            
            $judul_buku = [];
            if(count($contents[2])>0){
                foreach ($contents[2] as $judul){
                    $judul_buku[] = $judul;
                }
            }
            return array_combine($bid,$judul_buku);#array
        }
        */
        ?>