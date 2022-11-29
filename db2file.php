<?php
/**
 * script untuk mendumping hadis-hadis dari situs carihadis.com ke dalam file teks melalui API carihadis
 */

// API CariHadis
$url = 'http://api2.carihadis.com';

// daftar kitab matan yang SUDAH ada terjemahnya
$matan_terjemah = ['Shahih_Bukhari', 'Shahih_Muslim', 'Sunan_Abu_Daud', 'Sunan_Tirmidzi', 'Sunan_Nasai', 'Sunan_Ibnu_Majah', 'Musnad_Darimi', 'Muwatho_Malik', 'Musnad_Ahmad', 'Sunan_Daraquthni', 'Musnad_Syafii', 'Mustadrak_Hakim', 'Shahih_Ibnu_Khuzaimah', 'Shahih_Ibnu_Hibban', 'Bulughul_Maram', 'Riyadhus_Shalihin'];

// daftar kitab matan yang BELUM ada terjemahnya
$matan_arab = ['Al_Adabul_Mufrad', 'Mushannaf_Ibnu_Abi_Syaibah', 'Mushannaf_Abdurrazzaq', 'Musnad_Abu_Yala', 'Musnad_Bazzar', 'Mujam_Thabarani_Shaghir', 'Mujam_Thabarani_Awsath', 'Mujam_Thabarani_Kabir', 'Hilyatul_Aulia', 'Doa_Thabarani', 'Arbain_Nawawi_I', 'Arbain_Nawawi_II', 'Akhlak_Rawi_Khatib', 'Mukhtashar_Qiyamullail_Marwazi', 'Syuabul_Iman_Baihaqi', 'Shahih_Ibnu_Khuzaimah_Arab', 'Shahih_Ibnu_Hibban_Arab', 'Riyadhus_Shalihin_Arab', 'Shahih_Adabul_Mufrad_Terjemah', 'Silsilah_Shahihah_Terjemah', 'Bulughul_Maram_Arab', 'Bulughul_Maram_Tahqiq_Fahl', 'Sunan_Baihaqi_Shaghir', 'Sunan_Baihaqi_Kabir', 'Targhib_wat_Tarhib_Mundziri', 'Majmauz_Zawaid'];

// daftar kitab syarah yang BELUM ada terjemahnya
$syarah_arab = ['Fathul_Bari_Ibnu_Hajar', 'Syarh_Shahih_Muslim_Nawawi', 'Aunul_Mabud', 'Tuhfatul_Ahwadzi', 'Hasyiatus_Sindi_Nasai', 'Hasyiatus_Sindi_Ibnu_Majah', 'Tamhid_Ibnu_Abdil_Barr', 'Mirqatul_Mafatih_Ali_Al_Qari', 'Syarah_Arbain_Nawawi_Ibnu_Daqiq', 'Penjelasan_Hadis_Pilihan', 'Faidhul_Qadir', 'Mustadrak_Hakim_Arab', 'Silsilah_Shahihah_Albani'];

// untuk membersihkan harokat
$harokat = array("َ", "ِ", "ُ", "ً", "ٍ", "ٌ", "ْ", "ّ");

// ambil contoh kitab matan yang ada terjemahnya
foreach($matan_terjemah as $no => $kitab){
	// ambil id pertama
	$id = 1;
	// lakukan perulangan / looping
	while(true){
		// payload atau postfields		
		$data = ['kitab'=>$kitab, 'id'=>$id];
		$ch = curl_init();
		curl_setopt_array($ch, [
			CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_RETURNTRANSFER => true,
		]);
		// tampung hasil request ke dalam variabel
		$hasil = curl_exec($ch);
		// urai json hasil request
		$get = json_decode($hasil, true);
		// jika data kosong, beralih ke kitab berikutnya
		if(count($get['data']) == 0) break;
		// ambil nass arab (berharokat)
		$nass = $get['data'][1]['nass'];
		$nass = str_replace("\n", " ", $nass);
		// ambil nass arab tanpa harokat
		$nass_gundul = str_replace($harokat, '', $nass);
		$nass_gundul = str_replace("\n", " ", $nass_gundul);
		// ambil terjemah
		$terjemah = $get['data'][1]['terjemah'];
		$terjemah = str_replace("\n", " ", $terjemah);
		// tulis ke dalam file teks
		file_put_contents($kitab, "$no | $id | $nass | $terjemah\n", FILE_APPEND | LOCK_EX);
		// beralih ke id hadis berikutnya
		$id++;
		// beri jeda eksekusi berikutnya
		sleep(1);
	}
}
