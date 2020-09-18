@extends('layouts.app')

@section('content')
@if(Auth::user()->akses == 'admin')
<div class="col-lg-12">
<div style="margin-top:10px">
  <div class="info-box">
      <div class="small-box bg-green">
          <div class="inner">
              <h3>SIROLINE</h3>
              <div class="icon">
                  <i class="fa fa-edit"></i>
              </div>
          </div>
          <marquee height="35" scrollamount="7">
              <font size="5">
                  Selamat Datang di <b>SIROLINE</b> ~ Sistem Informasi Rapor Online ~ Anda Sebagai {{ Auth::user()->akses }}. &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; Anda Sedang Mengakses Sistem Informasi Rapor Online Santri Pondok Pesantren Al - Hidayah. &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
              </font>
          </marquee>
      </div>
  </div>
</div>
</div>

        <div class="col-md-12">
            <div class="col-md-4">
              <div class="small-box bg-green">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
                    <div class="info-box-content bg-green">
                      <span class="info-box-text">Santri</span>
                      <span class="info-box-number"><?= $query ?></span>
                    </div>
                     <!-- /.info-box-content -->
                    <a href="{{ route('santris.index') }}" class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="small-box bg-blue">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>
                    <div class="info-box-content bg-blue">
                      <span class="info-box-text">Guru</span>
                      <span class="info-box-number"><?= $query1 ?></span>
                    </div>
                    <!-- /.info-box-content -->
                    <a href="{{ route('gurus.index') }}" class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
            </div>
            <div class="col-md-4">
              <div class="small-box bg-yellow">
                  <!-- Apply any bg-* class to to the icon to color it -->
                  <span class="info-box-icon bg-yellow"><i class="fa fa-institution"></i></span>
                  <div class="info-box-content bg-yellow">
                    <span class="info-box-text">Kelas</span>
                    <span class="info-box-number"><?= $query2 ?></span>
                  </div>
                  <!-- /.info-box-content -->
                  <a href="{{ route('kelas.index') }}" class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="body-content enter">
            <div class="row">
              <div class="col-lg-12">
                <div style="margin-top:30px">
                <div class="col-md-3 col-sm-3">
                    <div class="info-box">
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h4><b>ADMIN</b></h4>
                                <!-- <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div> -->
                            </div>
                        </div>
                        <p style="text-align: justify; padding: 10px 20px 10px 20px ">
                          <span class="fa fa-user"> Melihat Dasboard Administrator </span><br>
                            <span class="fa fa-user"> Mengelola Hak Akses semua User</span><br>
                            <span class="fa fa-user"> Mengelola data santri</span><br>
                            <span class="fa fa-user"> Mengelola data kelas</span><br>
                            <span class="fa fa-user"> Mengelola data mapel</span><br>
                            <span class="fa fa-user"> Mengelola data guru</span><br>
                            <span class="fa fa-user"> Management Sistem</span><br>
                        </p>
                    </div>
                </div>
  
                <div class="col-md-3 col-sm-3">
                  <div class="info-box">
                      <div class="small-box bg-yellow">
                          <div class="inner">
                              <h4><b>GURU</b></h4>
                              <!-- <div class="icon">
                                  <i class="fa fa-user"></i>
                              </div> -->
                          </div>
                      </div>
                      <p style="text-align: justify; padding: 10px 20px 10px 20px ">
                          <span class="fa fa-user"> Melihat Dasboard Guru </span><br>
                          <span class="fa fa-user"> Mengelola data nilai ujian tulis </span><br>
                          <span class="fa fa-user"> Mengelola data catatan pelanggaran </span><br>
                      </p>
                  </div>
              </div>              
  
                <div class="col-md-3 col-sm-3">
                    <div class="info-box">
                        <div class="small-box bg-purple">
                            <div class="inner">
                                <h4><b>WALI KELAS</b></h4>
                                <!-- <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div> -->
                            </div>
                        </div>
                        <p style="text-align: justify; padding: 10px 20px 10px 20px ">
                            <span class="fa fa-user"> Melihat Dasboard Wali Kelas </span><br>
                            <span class="fa fa-user"> Mengelola Nilai Ujian Hafalan </span><br>
                            <span class="fa fa-user"> Mengelola Nilai Ujian Baca Al - Qur'an </span><br>
                        </p>
                    </div>
                </div>
    
                <div class="col-md-3 col-sm-3">
                    <div class="info-box">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h4><b>ORANG TUA</b></h4>
                                <!-- <div class="icon">
                                    <i class="fa fa-user"></i> -->
                                <!-- </div> -->
                            </div>
                        </div>
                        <p style="text-align: justify; padding: 10px 20px 10px 20px ">
                            <span class="fa fa-user"> Melihat Biodata Santri</span><br>
                            <span class="fa fa-user"> Melihat Nilai Rapor</span><br>
                            <span class="fa fa-user"> Melihat Catatan Pelanggaran</span><br>
                        </p>
                    </div>
                </div>
            </div>
          </div>  
        </div>
      </div>

    @endif

    @if(Auth::user()->akses == 'guru' || Auth::user()->akses == 'walikelas' || Auth::user()->akses == 'kepalayayasan')
    <style>
        p.uppercase{
            text-transform: uppercase;
            font-weight: bold;
            color: green;
            font-size: 30px;
            text-shadow: 1.5px 1.5px #5e5e5e;
        }
        img{
            margin-top: 12%;
        }
        p.ucapan{
            font-size: 20px;
        }
        p.ucapan1{
            margin-top: -1.2%;
            font-size: 20px;
        }
    </style>
    <div class="box-body">
        <div class="row">
            <div align='center'>
                <img src="{{ ('/img/alhidayah.PNG') }}" width="100" height="150">
            </div>
            <div align='center'>
                <p class="uppercase">Sistem Informasi Rapor Diniyah Online</p>
                <p class="ucapan">Assalamualaikum Wr.Wb, Selamat Datang <b>{{ Auth::user()->name }}</b></p>
                <p class="ucapan1">Anda Sebagai <b>{{ Auth::user()->akses }}</b></p>
            </div>
        </div>
    </div>
    @endif

    @if(Auth::user()->akses == 'orangtua')
    <style>
        p.uppercase{
            text-transform: uppercase;
            font-weight: bold;
            color: green;
            font-size: 30px;
            text-shadow: 1.5px 1.5px #5e5e5e;
        }
        img{
            margin-top: 12%;
        }
        p.ucapan{
            font-size: 20px;
        }
        p.ucapan1{
            margin-top: -1.2%;
            font-size: 20px;
        }
    </style>
    <div class="box-body">
        <div class="row">
            <div align='center'>
                <img src="{{ ('/img/alhidayah.PNG') }}" width="100" height="150">
            </div>
            <div align='center'>
                <p class="uppercase">Sistem Informasi Rapor Diniyah Online</p>
                <p class="ucapan">Assalamualaikum Wr.Wb, Selamat Datang <b>{{ Auth::user()->name }}</b></p>
                <p class="ucapan1">Anda Sebagai <b>{{ Auth::user()->akses }}</b> dari santri <b><?= $profile ?></b></p>
            </div>
        </div>
    </div>

    @endif
@endsection
