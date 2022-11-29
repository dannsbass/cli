<?php
/*
*
*Script sederhana untuk melihat struktur tabel MySQL
*/

# bangun koneksi ke database
$db = mysqli_connect('localhost','root','','contoh');

# query untuk melihat struktur tabel
$q = $db->query("describe murid");

# menampilkan struktur tabel, kita ambil Field dan Type saja
while($d = $q->fetch_assoc()){
 echo $d['Field']." ".$d['Type']."\n";
}

/*

contoh  hasil:

id-int(11)
nama-varchar(255)

*/
