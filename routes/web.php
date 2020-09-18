<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Middleware\Admin;
use App\Http\Middleware\Guru;
Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['verify' => true]);
Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->middleware('verified');
    Route::get('rapor-pdf/{santriId?}','RaporController@pdf')->name('rapor.pdf');
    Route::get('tatib-pdf','CttpelanggaranController@tatibPdf');
    
    Route::resource('gurus', 'GuruController')->middleware(Admin::class);
    Route::resource('home', 'HomeController');
    
    Route::resource('mapels', 'MapelController')->middleware(Admin::class);
    
    Route::resource('santris', 'SantriController')->middleware(Admin::class);
       
    Route::resource('tps', 'TpController')->middleware(Admin::class);
    
    Route::resource('kelas', 'KelasController')->middleware(Admin::class);
    // Route::resource('detailKelasSantris', 'detail_kelas_santriController')->middleware(Admin::class);
    
    Route::resource('semesters', 'SemesterController')->middleware(Admin::class);
    Route::resource('users', 'UserController')->middleware(Admin::class);
    Route::get('semesters/status/{id}','SemesterController@status')->name('semesters.status')->middleware(Admin::class);

    Route::get('nilaiHafalans/tombol/{id}','nilai_hafalanController@tombol')->name('nilaiHafalans.tombol')->middleware(Admin::class);

    if(Admin::class){
        Route::get('/search1', 'SantriController@search1');
        // Route::get('/search', 'KelasController@search');
        Route::get('/search2', 'MapelController@search2');
        Route::get('/search5', 'SemesterController@search5');
        Route::get('/search4', 'UserController@search4');
        Route::get('/search3', 'GuruController@search3');
        Route::get('/search6', 'TpController@search6');
        Route::resource('nilaiHafalans', 'nilai_hafalanController');
        Route::resource('detailNilaiHafalans', 'detail_nilai_hafalanController');
        Route::resource('nilaiBacaAlqurans', 'nilai_baca_alquranController');
        Route::resource('detailNilaiBacaAlqurans', 'detail_nilai_baca_alquranController');
        Route::resource('nilaiKeaktifans', 'nilai_keaktifanController');
        Route::resource('detailNilaiKeaktifans', 'detail_nilai_keaktifanController');
        Route::resource('rapors', 'raporController');
    }elseif(Walikelas::class){
        Route::resource('nilaiHafalans', 'nilai_hafalanController');
        Route::resource('detailNilaiHafalans', 'detail_nilai_hafalanController');
        Route::resource('nilaiBacaAlqurans', 'nilai_baca_alquranController');
        Route::resource('detailNilaiBacaAlqurans', 'detail_nilai_baca_alquranController');
        Route::resource('nilaiKeaktifans', 'nilai_keaktifanController');
        Route::resource('detailNilaiKeaktifans', 'detail_nilai_keaktifanController');
        Route::resource('rapors', 'raporController');
    };
    
    
    
    if(Admin::class){
        Route::resource('cttpelanggarans', 'CttpelanggaranController');
        Route::resource('nilaiUjianTulis', 'nilai_ujian_tulisController');
        Route::resource('detailNilaiUjianTulis', 'detail_nilai_ujian_tulisController');
        Route::get('detailMapels/{id_kelas}/{id_detail_mapel}', 'Detail_MapelController@edit')->name('detailMapels.isiNilai');
        Route::resource('detailMapels', 'Detail_MapelController');
        Route::resource('detailKelasSantris','detail_kelas_santriController');
        Route::resource('rapors', 'raporController');
    }elseif(Guru::class){
        Route::resource('cttpelanggarans', 'CttpelanggaranController');
        Route::resource('nilaiUjianTulis', 'nilai_ujian_tulisController');
        Route::resource('detailNilaiUjianTulis', 'detail_nilai_ujian_tulisController');
        Route::get('detailMapels/{id_kelas}/{id_detail_mapel}', 'Detail_MapelController@edit')->name('detailMapels.isiNilai');
        Route::resource('detailMapels', 'Detail_MapelController');
        Route::resource('rapors', 'raporController');
    }elseif(Walikelas::class){
        Route::resource('cttpelanggarans', 'CttpelanggaranController');
        Route::resource('nilaiUjianTulis', 'nilai_ujian_tulisController');
        Route::resource('detailNilaiUjianTulis', 'detail_nilai_ujian_tulisController');
        Route::get('detailMapels/{id_kelas}/{id_detail_mapel}', 'Detail_MapelController@edit')->name('detailMapels.isiNilai');
        Route::resource('detailMapels', 'Detail_MapelController');
        Route::resource('rapors', 'raporController');
    }elseif(Kepalayayasan::class){
        Route::resource('detailKelasSantris','detail_kelas_santriController');
        Route::resource('cttpelanggarans', 'CttpelanggaranController');
        Route::resource('nilaiUjianTulis', 'nilai_ujian_tulisController');
        Route::resource('detailNilaiUjianTulis', 'detail_nilai_ujian_tulisController');
        Route::get('detailMapels/{id_kelas}/{id_detail_mapel}', 'Detail_MapelController@edit')->name('detailMapels.isiNilai');
        Route::resource('detailMapels', 'Detail_MapelController');
        Route::resource('rapors', 'raporController');
    }elseif(Orangtua::class){
        Route::resource('cttpelanggarans', 'CttpelanggaranController');
        Route::resource('rapors', 'raporController');
    };
    
    
});




