<?php
function penyebut($angka) {
   $angka=abs($angka);
   $baca =array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
 
   $penyebut="";
    if ($angka < 12){
        $penyebut= " " . $baca[$angka];
    }
    else if ($angka < 20){
        $penyebut= penyebut($angka - 10) . " belas";
    }
    else if ($angka < 100){
        $penyebut= penyebut($angka / 10) . " Puluh" . penyebut($angka % 10);
    }
    else if ($angka < 200){
        $penyebut= " seratus" . penyebut($angka - 100);
    }
    else if ($angka < 1000){
        $penyebut= penyebut($angka / 100) . " Ratus" . penyebut($angka % 100);
    }
    else if ($angka < 2000){
        $penyebut= " seribu" . penyebut($angka - 1000);
    }
    else if ($angka < 1000000){
        $penyebut= penyebut($angka / 1000) . " Ribu" . penyebut($angka % 1000);
    }
    else if ($angka < 1000000000){
       $penyebut= penyebut($angka / 1000000) . " Juta" . penyebut($angka % 1000000);
    }
       return $penyebut;
}
function terbilang($angka) {
    if($angka<0) {
        $hasil = "Minus ". trim(penyebut($angka));
    } else {
        $hasil = trim(penyebut($angka));
    }     		
    return $hasil;
}
function konversi($huruf){
    $huruf=abs($huruf);
    $data = array("A", "B", "C", "D", "E");
    $nilaiAngka = "";
    $nilaiHuruf = "";

    // if(($nilaiAngka < 0) || ($nilaiAngka > 100))
    // {
    // echo "Nilai angka yang diberikan salah";
    // }
    // else
    // {
    if (($huruf >= 80) && ($huruf <= 100)){
        $nilaiHuruf = "A";
    }else if (($huruf >= 70) && ($huruf <= 79)){
        $nilaiHuruf = "B";
    }else if (($huruf >= 60) && ($huruf <= 69)){
        $nilaiHuruf = "C";
    }else if (($huruf >= 50) && ($huruf <= 59)){
        $nilaiHuruf = "D";
    }else if (($huruf >= 0) && ($huruf <= 49)){
        $nilaiHuruf = "E";
    }
    // }
    return $nilaiHuruf;
}
function konversiHuruf($huruf) {
    $hasilHuruf = konversi($huruf); 		
    return $hasilHuruf;
}
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>