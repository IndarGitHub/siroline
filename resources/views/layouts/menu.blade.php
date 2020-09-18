<li class="header">MENU NAVIGASI</li>
<li>
    <a href="http://localhost:8000/home">
        <i class="fa fa-tachometer"></i> <span>DASHBOARD</span>
        <span class="pull-right-container">
            <small class="label pull-right bg-green">home</small>
        </span>
    </a>
</li>

@if(Auth::user()->akses == 'admin')
<li class="treeview">
    <a href="#">
        <i class="fa fa-home"></i>
        <span>DATA MASTER</span>
        <span class="pull-right-container">
            <span class="label label-primary pull-right">6</span>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('gurus*') ? 'active' : '' }}">
            <a href="{{ route('gurus.index') }}"><i class="fa fa-user-o"></i><span>Guru</span></a>
        </li>
        <li class="{{ Request::is('mapels*') ? 'active' : '' }}">
            <a href="{{ route('mapels.index') }}"><i class="fa fa-file-text"></i><span>Mapel</span></a>
        </li>
        <li class="{{ Request::is('kelas*') ? 'active' : '' }}">
            <a href="{{ route('kelas.index') }}"><i class="fa fa-bank"></i><span>Kelas</span></a>
        </li>
        <li class="{{ Request::is('santris*') ? 'active' : '' }}">
            <a href="{{ route('santris.index') }}"><i class="fa fa-user"></i><span>Santri</span></a>
        </li>
        <li class="{{ Request::is('detailKelasSantris*') ? 'active' : '' }}">
            <a href="{{ route('detailKelasSantris.index') }}"><i class="fa fa-bank"></i><span>Detail Kelas Santri</span></a>
        </li>
        <li class="{{ Request::is('semesters*') ? 'active' : '' }}">
            <a href="{{ route('semesters.index') }}"><i class="fa fa-circle-o"></i><span>Semester</span></a>
        </li>
        <li class="{{ Request::is('tps*') ? 'active' : '' }}">
            <a href="{{ route('tps.index') }}"><i class="fa fa-check-square-o"></i><span>Tipe Pelanggaran</span></a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-book"></i><span>DATA NILAI</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('nilaiUjianTulis*') ? 'active' : '' }}">
                <a href="{{ route('nilaiUjianTulis.index') }}"><i class="fa fa-edit"></i><span>Nilai Ujian Tulis</span></a>
            </li>
            <li class="{{ Request::is('nilaiHafalans*') ? 'active' : '' }}">
                <a href="{{ route('nilaiHafalans.index') }}"><i class="fa fa-edit"></i><span>Nilai Hafalan</span></a>
            </li>
            <li class="{{ Request::is('nilaiBacaAlqurans*') ? 'active' : '' }}">
                <a href="{{ route('nilaiBacaAlqurans.index') }}"><i class="fa fa-edit"></i><span>Nilai Baca Alquran</span></a>
            </li>
            <li class="{{ Request::is('nilaiKeaktifans*') ? 'active' : '' }}">
                <a href="{{ route('nilaiKeaktifans.index') }}"><i class="fa fa-edit"></i><span>Nilai Keaktifans</span></a>
            </li>
            {{-- @endif --}}
            {{-- <li class="{{ Request::is('detailNilaiKeaktifans*') ? 'active' : '' }}">
                <a href="{{ route('detailNilaiKeaktifans.index') }}"><i class="fa fa-edit"></i><span>Detail Nilai Keaktifans</span></a>
            </li> --}}
            {{-- <li class="{{ Request::is('detailNilaiHafalans*') ? 'active' : '' }}">
                <a href="{{ route('detailNilaiHafalans.index') }}"><i class="fa fa-edit"></i><span>Detail Nilai Hafalans</span></a>
            </li> --}}
            {{-- <li class="{{ Request::is('detailNilaiBacaAlqurans*') ? 'active' : '' }}">
                <a href="{{ route('detailNilaiBacaAlqurans.index') }}"><i class="fa fa-edit"></i><span>Detail Nilai Baca Alqurans</span></a>
            </li>    --}}
            {{-- <li class="{{ Request::is('detailMapels*') ? 'active' : '' }}">
            <a href="{{ route('detailMapels.index') }}"><i class="fa fa-edit"></i><span>Detail  Mapels</span></a>
            </li> --}}

            {{-- <li class="{{ Request::is('detailNilaiUjianTulis*') ? 'active' : '' }}">
            <a href="{{ route('detailNilaiUjianTulis.index') }}"><i class="fa fa-edit"></i><span>Detail Nilai Ujian Tulis</span></a>
            </li> --}}            
        </ul>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-paste"></i><span>Nilai Hasil Belajar</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('rapors*') ? 'active' : '' }}">
                    <a href="{{ route('rapors.index') }}"><i class="fa fa-edit"></i><span>Rapor</span></a>
                </li>
            </ul>
        </li>

    <li class="{{ Request::is('cttpelanggarans*') ? 'active' : '' }}">
        <a href="{{ route('cttpelanggarans.index') }}"><i class="fa fa-list-alt"></i><span>Catatan_Pelanggaran</span>
        <span class="pull-right-container">
            <small class="label pull-right bg-yellow">note</small>
        </span>
        </a>
    </li>

    <li class="header">PENGATURAN AKSES USER</li>
    <li class="{{ Request::is('users*') ? 'active' : '' }}">
     <a href="{{ route('users.index') }}"><i class="fa fa-user"></i><span>Permission User</span>
        <span class="pull-right-container">
            <small class="label pull-right bg-purple">user</small>
        </span>
     </a>
    </li>
@endif

@if(Auth::user()->akses == 'guru')
        <li class="{{ Request::is('nilaiUjianTulis*') ? 'active' : '' }}">
            <a href="{{ route('nilaiUjianTulis.index') }}"><i class="fa fa-edit"></i><span>Nilai Ujian Tulis</span></a>
        </li>
        <li class="{{ Request::is('cttpelanggarans*') ? 'active' : '' }}">
            <a href="{{ route('cttpelanggarans.index') }}"><i class="fa fa-list-alt"></i><span>Catatan_Pelanggaran</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-yellow">note</small>
            </span>
            </a>
        </li>
@endif

@if(Auth::user()->akses == 'walikelas')
<li class="treeview">
    <a href="#"><i class="fa fa-book"></i><span>DATA NILAI</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('nilaiUjianTulis*') ? 'active' : '' }}">
                <a href="{{ route('nilaiUjianTulis.index') }}"><i class="fa fa-edit"></i><span>Nilai Ujian Tulis</span></a>
            </li>
            <li class="{{ Request::is('nilaiHafalans*') ? 'active' : '' }}">
                <a href="{{ route('nilaiHafalans.index') }}"><i class="fa fa-edit"></i><span>Nilai Hafalan</span></a>
            </li>
            <li class="{{ Request::is('nilaiBacaAlqurans*') ? 'active' : '' }}">
                <a href="{{ route('nilaiBacaAlqurans.index') }}"><i class="fa fa-edit"></i><span>Nilai Baca Alquran</span></a>
            </li>
            <li class="{{ Request::is('nilaiKeaktifans*') ? 'active' : '' }}">
                <a href="{{ route('nilaiKeaktifans.index') }}"><i class="fa fa-edit"></i><span>Nilai Keaktifan</span></a>
            </li>            
        </ul>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-paste"></i><span>Nilai Hasil Belajar</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('rapors*') ? 'active' : '' }}">
                    <a href="{{ route('rapors.index') }}"><i class="fa fa-edit"></i><span>Rapor</span></a>
                </li>
            </ul>
        </li>
    <li class="{{ Request::is('cttpelanggarans*') ? 'active' : '' }}">
        <a href="{{ route('cttpelanggarans.index') }}"><i class="fa fa-list-alt"></i><span>Catatan_Pelanggaran</span>
        <span class="pull-right-container">
            <small class="label pull-right bg-yellow">note</small>
        </span>
        </a>
    </li>
@endif

@if(Auth::user()->akses == 'kepalayayasan')
    <li class="{{ Request::is('detailKelasSantris*') ? 'active' : '' }}">
    <a href="{{ route('detailKelasSantris.index') }}"><i class="fa fa-bank"></i><span>Melihat Data Santri</span></a>
    </li>
    <li class="{{ Request::is('nilaiUjianTulis*') ? 'active' : '' }}">
    <a href="{{ route('nilaiUjianTulis.index') }}"><i class="fa fa-edit"></i><span>Nilai Ujian Tulis</span></a>
    </li>
    <li class="{{ Request::is('cttpelanggarans*') ? 'active' : '' }}">
    <a href="{{ route('cttpelanggarans.index') }}"><i class="fa fa-list-alt"></i><span>Catatan_Pelanggaran</span>
    <span class="pull-right-container">
        <small class="label pull-right bg-yellow">note</small>
    </span>
    </a>
    </li>
@endif

@if(Auth::user()->akses == 'orangtua')
<li class="treeview">
    <a href="#"><i class="fa fa-paste"></i><span>Nilai Hasil Belajar</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('rapors*') ? 'active' : '' }}">
                <a href="{{ route('rapors.index') }}"><i class="fa fa-edit"></i><span>Rapor</span></a>
            </li>
        </ul>
    </li>
<li class="{{ Request::is('cttpelanggarans*') ? 'active' : '' }}">
    <a href="{{ route('cttpelanggarans.index') }}"><i class="fa fa-list-alt"></i><span>Catatan_Pelanggaran</span>
    <span class="pull-right-container">
        <small class="label pull-right bg-yellow">note</small>
    </span>
    </a>
</li>
@endif



