<?php use App\Repositories\SantriRepository; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raport</title>
<style>
div.border{
  border: 8px solid black;
  border-radius: 5px;
}
img.image{
  margin-top: 1%;
}
p.top1{
 margin-top: 2%;
}
p.top2{
 margin-top: -1%;
}
p.top3{
 margin-top: -1%;
 font-size: 14px;
}
p.top4{
 font-size: 14px;
 margin-left: 13%;
}
p.top5{
font-size: 14px;
 margin-left: 3%;
 margin-top:-2%;
}
tr.tr1{
 margin-top:-2%;
 border: 1px solid red;
 border-collapse: collapse;
}
table.tb1{
 margin-left: 10%;
}
</style>
</head>
<body>

@if(Auth::user()->akses == 'orangtua')
    @php
   $total = 0;
   $total1 = 0;
   $total2 = 0;
   foreach ($dataAlquran as $key => $value) {
       $total += ( (float)$value->kelancaran + (float)$value->makhorijul + (float)$value->tajwid);
   }
   foreach ($dataHafalan as $key => $value) {
       $total1 += ( (float)$value->kelancaran);
   }foreach ($dataTulis as $key => $value) {
       $total2 += ( (float)$value->nilai_angka);
   }
   $hasil = $total + $total1 + $total2;
 
   $count1 = $dataTulis->count('nilai_angka');
   $count2 = $dataHafalan->count('kelancaran');
   $count3 = $dataAlquran->count('kelancaran');
   $count4 = $dataAlquran->count('tajwid');
   $count5 = $dataAlquran->count('makhorjul');
   $countHasil = $count1 + $count2 + $count3 + $count4 + $count5;
   $rata2 = $hasil / $countHasil;
   $format_number = number_format($rata2, 0, ',', ' ');
    @endphp
@endif
@if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'walikelas')
    @php
   $total_1 = 0;
   $total1_1 = 0;
   $total2_1 = 0;
   foreach ($dataAlquran1 as $key => $value) {
       $total_1 += ( (float)$value->kelancaran + (float)$value->makhorijul + (float)$value->tajwid);
   }
   foreach ($dataHafalan1 as $key => $value) {
       $total1_1 += ( (float)$value->kelancaran);
       
   }foreach ($dataTulis1 as $key => $value) {
       $total2_1 += ( (float)$value->nilai_angka);
       
   }
   $hasil_1 = $total_1 + $total1_1 + $total2_1;
   $count1_1 = $dataTulis1->count('nilai_angka');
   $count2_1 = $dataHafalan1->count('kelancaran');
   $count3_1 = $dataAlquran1->count('kelancaran');
   $count4_1 = $dataAlquran1->count('tajwid');
   $count5_1 = $dataAlquran1->count('makhorjul');
   $countHasil_1 = $count1_1 + $count2_1 + $count3_1 + $count4_1 + $count5_1;
   $rata2_1 = $hasil_1 / $countHasil_1;
   $format_number = number_format($rata2_1, 0, ',', ' ');
    @endphp
@endif
 <div class="border">
  @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'walikelas')
<div align="center">
   <img src="./img/bismillah.png" width="175" height="31" class="image">
<p class="top1"><b>SURAT KETERANGAN</b></p>
<p class="top2"><b>HASIL BELAJAR @foreach ($dataHafalan1 as $item)
   {{ $item->semester }}
   @endforeach TAHUN AJARAN @foreach ($dataHafalan1 as $item)
   {{ $item->thn_ajaran }}
   @endforeach</b></p>
<!--<p class="top2"><b>مادراساه ديننيياه ووستهو الءهيداياه</b></p>-->
<p class="top2"><b>MADRASAH DINIYAH WUSTHO AL-HIDAYAH</b></p>
<p class="top3"><b>Simbaringin Kutorejo Mojokerto Jawa Timur Nomor Statistik : 311 2 35 16 0379</b></p>
</div>
<div>
<p class="top4">Yang bertandatangan di bawah ini, Kepala Yayasan Madrasah Diniyah Al-Hidayah Simbaringin Kutorejo</p>
<p class="top5">Kabupaten Mojokerto menerangkan bahwa : </p>
</div>

<table class="tb1">
      <tr>
          <td><b>Nama Santri</b></td>
          <td><b>:</b></td>
          @foreach ($dataHafalan1 as $item)
          <td>{{ $item->nm_santri }}</td>
          @endforeach
      </tr>
      <tr>
          <td><b>Tempat dan Tanggal Lahir</b></td>
          <td><b>:</b></td>
          @foreach ($dataHafalan1 as $item)
          <td>{{ $item->tmp_lhr }}, {{ $item->tgl_lhr }}</td>
          @endforeach
      </tr>
      <tr>
          <td><b>Nomor Induk Santri</b></td>
          <td><b>:</b></td>
          @foreach ($dataHafalan1 as $item)
          <td>{{ $item->no_induk }}</td>
          @endforeach
      </tr>
      <tr>
          <td><b>Kelas</b></td>
          <td><b>:</b></td>
          @foreach ($dataHafalan1 as $item)
          <td>{{ $item->nm_kelas }}</td>
          @endforeach
      </tr><br>
     <table style='border-collapse:collapse; width:740px; margin-left:10%'>
        <tr>
           <td style='border: 1px solid; text-align:center; width:50px' rowspan='2'><b>No</b></td>
           <td style='border: 1px solid; text-align:center' rowspan='2'><b>Mata Pelajaran</b></td>
           <td style='border: 1px solid; text-align:center' colspan='2'><b>Nilai Hasil Belajar</b></td>
        </tr>
        <tr>
           <td style='border: 1px solid; text-align:center; width:100px'><b>Angka</b></td>
           <td style='border: 1px solid; text-align:center width: 550px'><b>Dengan Huruf</b></td>
        </tr>
        @foreach ($dataTulis1 as $row=>$item)
        <tr>
           <td style='border: 1px solid; text-align:center'>{{ $row +1 }}</td>
           <td style='border: 1px solid; text-align:justify'>{{ $item->nm_mapel }}</td>
           <td style='border: 1px solid; text-align:center'>{{ $item->nilai_angka }}</td>
           <td style='border: 1px solid; text-align:justify'>{{ $item->nilai_huruf }}</td>
        </tr>  
        @endforeach
        @foreach ($dataHafalan1 as $item)
        <tr>
           <td style='border: 1px solid; text-align:center'></td>
           <td style='border: 1px solid; text-align:justify'>Hafalan</td>
           <td style='border: 1px solid; text-align:center'>{{ $item->kelancaran }}</td>
           <td style='border: 1px solid; text-align:justify'>{{ $item->nilai_huruf }}</td>
        </tr>  
        @endforeach
        @foreach ($dataAlquran1 as $item)
        <tr>
           <td style='border: 1px solid; text-align:center'></td>
           <td style='border: 1px solid; text-align:justify'>Al-Qur'an Tajwid</td>
           <td style='border: 1px solid; text-align:center'>{{ $item->tajwid }}</td>
           <td style='border: 1px solid; text-align:justify'>{{ $item->tajwid_huruf }}</td>
        </tr>
        <tr>
           <td style='border: 1px solid; text-align:center'></td>
           <td style='border: 1px solid; text-align:justify'>Al-Qur'an Kelancaran</td>
           <td style='border: 1px solid; text-align:center'>{{ $item->kelancaran }}</td>
           <td style='border: 1px solid; text-align:justify'>{{ $item->kel_huruf }}</td>
        </tr>
        <tr>
           <td style='border: 1px solid; text-align:center'></td>
           <td style='border: 1px solid; text-align:justify'>Al-Qur'an Makhorijul</td>
           <td style='border: 1px solid; text-align:center'>{{ $item->makhorijul }}</td>
           <td style='border: 1px solid; text-align:justify'>{{ $item->makho_huruf }}</td>
        </tr>  
        @endforeach
        <tr>
           <td colspan='2' style='border: 1px solid'><b>Jumlah</b></td>
           <td style='border: 1px solid; text-align:center'><b>{{ $hasil_1 }}</b></td>  
           <td style='border: 1px solid; text-align:justify'>{{ terbilang($hasil_1) }}</td>
        </tr>
        <tr>
           <td colspan='2' style='border: 1px solid'><b>Rata - Rata</b></td>
           <td style='border: 1px solid; text-align:center'><b>{{ $format_number }}</b></td>
           <td style='border: 1px solid; text-align:justify'>{{ terbilang($format_number) }}</td>
        </tr>
        <tr>
           <td colspan='4' style='border: 1px solid;'><b>Peringkat Kelas Ke</b> ..... <b>Dari</b> <?= $total_santri->count() ?> <b>Santri</b></td>
        </tr>
        <tr>
           <td colspan='3' style='border: 1px solid; text-align:center'><b> Kegiatan Ekstra Kulikuler</b></td>
           <td style='border: 1px solid; text-align:center'><b>Keterangan</b></td>
        </tr>
        <tr>
           <td style='border: 1px solid;' colspan='2' rowspan="3"><b>Kegitan Ekstra Kurikuler</b></td> 
           <td style='border: 1px solid; width: 150px'>1. Qiro'atul Qur'an</td> 
           @foreach ($dataKeaktifan1 as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->qiroatul_quran }}</b></td>    
           @endforeach
        </tr>
        <tr>
           <td style='border: 1px solid;'>2. Muhadhoroh</td>
           @foreach ($dataKeaktifan1 as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->muhadhoroh }}</b></td>     
           @endforeach 
        </tr>
        <tr>
           <td style='border: 1px solid;'>3. Maulid diba</td> 
           @foreach ($dataKeaktifan1 as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->maulid_diba }}</b></td>     
           @endforeach 
        </tr>
        <tr>
           <td style='border: 1px solid;' colspan='2' rowspan="3"><b>Kepribadian</b></td> 
           <td style='border: 1px solid; '>1. Kelakuan/Akhlaq</td> 
           @foreach ($dataKeaktifan1 as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->kelakuan }}</b></td>     
           @endforeach  
        </tr>
        <tr>
           <td style='border: 1px solid;'>2. Kerajinan / Muwadlobah</td> 
           @foreach ($dataKeaktifan1 as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->kerajinan }}</b></td>     
           @endforeach 
        </tr>
        <tr>
           <td style='border: 1px solid;'>3. Kerapian</td> 
           @foreach ($dataKeaktifan1 as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->kerapian }}</b></td>     
           @endforeach  
        </tr>
        <tr>
           <td style='border: 1px solid;' colspan='2' rowspan="3"><b>Ketidak Hadiran</b></td> 
           <td style='border: 1px solid;'>1. Sakit</td> 
           @foreach ($dataKeaktifan1 as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->ket_sakit }} hari</b></td>     
           @endforeach 
        </tr>
        <tr>
           <td style='border: 1px solid;'>2. Izin</td> 
           @foreach ($dataKeaktifan1 as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->ket_izin }} hari</b></td>     
           @endforeach 
        </tr>
        <tr>
           <td style='border: 1px solid;'>3. Alpha</td> 
           @foreach ($dataKeaktifan1 as $item)
           <td style='border: 1px solid; text-align:center' text-align:center><b>{{ $item->tanpa_ket }} hari</b></td>     
           @endforeach  
        </tr>
        <tr>
           <td style='border: 1px solid;' colspan='4'><b>Catatan</b></td> 
        </tr>
     </table>
     </table>
     <table align='center'>
         <tr>
           <td style=' text-align:right;' colspan='4'><b><i>Mojokerto, <?= tgl_indo(date('Y-m-d')) ?></i></b></td> 
        </tr>
         <tr>
           <td colspan='2' style=' text-align:center;'><b>Orang Tua/Wali Santri</b></td> 
           <td colspan='1' style=' text-align:center;'><b>Wali Kelas</b></td>
           <td colspan='1' style=' text-align:center;'><b>Kepala Madrasah Diniyah Al Hidayah</b></td>
        </tr>
        <tr>
           <td colspan='5'></td> 
        </tr>
        <tr>
            @foreach ($dataHafalan1 as $item)
        <td colspan='2' style='text-align:center;'><u><b>{{ $item->nm_wali_santri }}</b></u></td>
            @endforeach
            @foreach ($dataHafalan1 as $item)
        <td style=' text-align:center; width:181px;'><u><b>{{ $item->name }}</b></u></td>
            @endforeach
        <td style='text-align:center;'><u><b>Muhammad Rifa'i Lc</b></u></td>
        </tr>
     </table>
   @endif

   @if(Auth::user()->akses == 'orangtua')
   <div align="center">
      <img src="./img/bismillah.png" width="175" height="31" class="image">
      <p class="top1"><b>SURAT KETERANGAN</b></p>
      <p class="top2"><b>HASIL BELAJAR @foreach ($dataHafalan as $item)
         {{ $item->semester }}
         @endforeach TAHUN AJARAN @foreach ($dataHafalan as $item)
         {{ $item->thn_ajaran }}
         @endforeach</b></p>
      <!--<p class="top2"><b>مادراساه ديننيياه ووستهو الءهيداياه</b></p>-->
      <p class="top2"><b>MADRASAH DINIYAH WUSTHO AL-HIDAYAH</b></p>
      <p class="top3"><b>Simbaringin Kutorejo Mojokerto Jawa Timur Nomor Statistik : 311 2 35 16 0379</b></p>
      </div>
      <div>
      <p class="top4">Yang bertandatangan di bawah ini, Kepala Yayasan Madrasah Diniyah Al-Hidayah Simbaringin Kutorejo</p>
      <p class="top5">Kabupaten Mojokerto menerangkan bahwa : </p>
      </div>
   <table class="tb1">
      <tr>
          <td><b>Nama Santri</b></td>
          <td><b>:</b></td>
          @foreach ($dataHafalan as $item)
          <td>{{ $item->nm_santri }}</td>
          @endforeach
      </tr>
      <tr>
          <td><b>Tempat dan Tanggal Lahir</b></td>
          <td><b>:</b></td>
          @foreach ($dataHafalan as $item)
          <td>{{ $item->tmp_lhr }}, {{ $item->tgl_lhr }}</td>
          @endforeach
      </tr>
      <tr>
          <td><b>Nomor Induk Santri</b></td>
          <td><b>:</b></td>
          @foreach ($dataHafalan as $item)
          <td>{{ $item->no_induk }}</td>
          @endforeach
      </tr>
      <tr>
          <td><b>Kelas</b></td>
          <td><b>:</b></td>
          @foreach ($dataHafalan as $item)
          <td>{{ $item->nm_kelas }}</td>
          @endforeach
      </tr><br>
     <table style='border-collapse:collapse; width:740px; margin-left:10%'>
        <tr>
           <td style='border: 1px solid; text-align:center; width:50px' rowspan='2'><b>No</b></td>
           <td style='border: 1px solid; text-align:center' rowspan='2'><b>Mata Pelajaran</b></td>
           <td style='border: 1px solid; text-align:center' colspan='2'><b>Nilai Hasil Belajar</b></td>
        </tr>
        <tr>
           <td style='border: 1px solid; text-align:center; width:100px'><b>Angka</b></td>
           <td style='border: 1px solid; text-align:center width: 550px'><b>Dengan Huruf</b></td>
        </tr>
        @foreach ($dataTulis as $row=>$item)
        <tr>
           <td style='border: 1px solid; text-align:center'>{{ $row +1 }}</td>
           <td style='border: 1px solid; text-align:justify'>{{ $item->nm_mapel }}</td>
           <td style='border: 1px solid; text-align:center'>{{ $item->nilai_angka }}</td>
           <td style='border: 1px solid; text-align:justify'>{{ $item->nilai_huruf }}</td>
        </tr>  
        @endforeach
        @foreach ($dataHafalan as $item)
        <tr>
           <td style='border: 1px solid; text-align:center'></td>
           <td style='border: 1px solid; text-align:justify'>Hafalan</td>
           <td style='border: 1px solid; text-align:center'>{{ $item->kelancaran }}</td>
           <td style='border: 1px solid; text-align:justify'>{{ $item->nilai_huruf }}</td>
        </tr>  
        @endforeach
        @foreach ($dataAlquran as $item)
        <tr>
           <td style='border: 1px solid; text-align:center'></td>
           <td style='border: 1px solid; text-align:justify'>Al-Qur'an Tajwid</td>
           <td style='border: 1px solid; text-align:center'>{{ $item->tajwid }}</td>
           <td style='border: 1px solid; text-align:justify'>{{ $item->tajwid_huruf }}</td>
        </tr>
        <tr>
           <td style='border: 1px solid; text-align:center'></td>
           <td style='border: 1px solid; text-align:justify'>Al-Qur'an Kelancaran</td>
           <td style='border: 1px solid; text-align:center'>{{ $item->kelancaran }}</td>
           <td style='border: 1px solid; text-align:justify'>{{ $item->kel_huruf }}</td>
        </tr>
        <tr>
           <td style='border: 1px solid; text-align:center'></td>
           <td style='border: 1px solid; text-align:justify'>Al-Qur'an Makhorijul</td>
           <td style='border: 1px solid; text-align:center'>{{ $item->makhorijul }}</td>
           <td style='border: 1px solid; text-align:justify'>{{ $item->makho_huruf }}</td>
        </tr>  
        @endforeach
        <tr>
           <td colspan='2' style='border: 1px solid'><b>Jumlah</b></td>
           <td style='border: 1px solid; text-align:center'><b>{{ $hasil }}</b></td>  
           <td style='border: 1px solid; text-align:justify'>{{ terbilang($hasil) }}</td>
        </tr>
        <tr>
           <td colspan='2' style='border: 1px solid'><b>Rata - Rata</b></td>
           <td style='border: 1px solid; text-align:center'><b>{{ $format_number }}</b></td>
           <td style='border: 1px solid; text-align:justify'>{{ terbilang($format_number) }}</td>
        </tr>
        <tr>
           <td colspan='4' style='border: 1px solid;'><b>Peringkat Kelas Ke</b> ..... <b>Dari</b> <?= $total_santri->count() ?> <b>Santri</b></td>
        </tr>
        <tr>
           <td colspan='3' style='border: 1px solid; text-align:center'><b> Kegiatan Ekstra Kulikuler</b></td>
           <td style='border: 1px solid; text-align:center'><b>Keterangan</b></td>
        </tr>
        <tr>
           <td style='border: 1px solid;' colspan='2' rowspan="3"><b>Kegitan Ekstra Kurikuler</b></td> 
           <td style='border: 1px solid; width: 150px'>1. Qiro'atul Qur'an</td> 
           @foreach ($dataKeaktifan as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->qiroatul_quran }}</b></td>    
           @endforeach
        </tr>
        <tr>
           <td style='border: 1px solid;'>2. Muhadhoroh</td>
           @foreach ($dataKeaktifan as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->muhadhoroh }}</b></td>     
           @endforeach 
        </tr>
        <tr>
           <td style='border: 1px solid;'>3. Maulid diba</td> 
           @foreach ($dataKeaktifan as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->maulid_diba }}</b></td>     
           @endforeach 
        </tr>
        <tr>
           <td style='border: 1px solid;' colspan='2' rowspan="3"><b>Kepribadian</b></td> 
           <td style='border: 1px solid; '>1. Kelakuan/Akhlaq</td> 
           @foreach ($dataKeaktifan as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->kelakuan }}</b></td>     
           @endforeach  
        </tr>
        <tr>
           <td style='border: 1px solid;'>2. Kerajinan / Muwadlobah</td> 
           @foreach ($dataKeaktifan as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->kerajinan }}</b></td>     
           @endforeach 
        </tr>
        <tr>
           <td style='border: 1px solid;'>3. Kerapian</td> 
           @foreach ($dataKeaktifan as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->kerapian }}</b></td>     
           @endforeach  
        </tr>
        <tr>
           <td style='border: 1px solid;' colspan='2' rowspan="3"><b>Ketidak Hadiran</b></td> 
           <td style='border: 1px solid;'>1. Sakit</td> 
           @foreach ($dataKeaktifan as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->ket_sakit }} hari</b></td>     
           @endforeach 
        </tr>
        <tr>
           <td style='border: 1px solid;'>2. Izin</td> 
           @foreach ($dataKeaktifan as $item)
           <td style='border: 1px solid; text-align:center'><b>{{ $item->ket_izin }} hari</b></td>     
           @endforeach 
        </tr>
        <tr>
           <td style='border: 1px solid;'>3. Alpha</td> 
           @foreach ($dataKeaktifan as $item)
           <td style='border: 1px solid; text-align:center' text-align:center><b>{{ $item->tanpa_ket }} hari</b></td>     
           @endforeach  
        </tr>
        <tr>
           <td style='border: 1px solid;' colspan='4'><b>Catatan</b></td> 
        </tr>
     </table>
     </table>
     <table align='center'>
         <tr>
           <td style=' text-align:right;' colspan='4'><b><i>Mojokerto, <?= tgl_indo(date('Y-m-d')) ?></i></b></td> 
        </tr>
         <tr>
           <td colspan='2' style=' text-align:center;'><b>Orang Tua/Wali Santri</b></td> 
           <td colspan='1' style=' text-align:center;'><b>Wali Kelas</b></td>
           <td colspan='1' style=' text-align:center;'><b>Kepala Madrasah Diniyah Al Hidayah</b></td>
        </tr>
        <tr>
           <td colspan='5'></td> 
        </tr>
        <tr>
            @foreach ($dataHafalan as $item)
        <td colspan='2' style='text-align:center;'><u><b>{{ $item->nm_wali_santri }}</b></u></td>
            @endforeach
            @foreach ($dataHafalan as $item)
        <td style=' text-align:center; width:181px;'><u><b>{{ $item->name }}</b></u></td>
            @endforeach
        <td style='text-align:center;'><u><b>Muhammad Rifa'i Lc</b></u></td>
        </tr>
     </table>
     @endif
</div>
</body>
</html>