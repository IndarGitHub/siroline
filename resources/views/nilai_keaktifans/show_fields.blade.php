<!-- Kelas Id Field -->
<div class="form-group">
    {!! Form::label('kelas_id', 'Nama Kelas :') !!}
    <p>{{ $nilaiKeaktifan->kelas->nm_kelas }}</p>
</div>

<!-- Semester Id Field -->
<div class="form-group">
    {!! Form::label('semester_id', 'Semester :') !!}
    <p>{{ $nilaiKeaktifan->semester->semester }}</p>
</div>

<div class="form-group">
    <table class="table table-bordered table-condensed">
        <thead>
            <tr>
                <th>Nomor Induk</th>
                <th>Nama Santri</th>
                <th>Nilai Angka QQ</th>
                <th>Nilai Huruf QQ</th>
                <th>Nilai Angka Muhadhoroh</th>
                <th>Nilai huruf Muhadhoroh</th>
                <th>Nilai Angka Diba</th>                                
                <th>Nilai Huruf Diba</th>
                <th>Nilai Angka kelakuan</th>
                <th>Nilai Kelakuan</th>
                {{-- <th>Nilai Angka Kerajinan</th>
                <th>Nilai Huruf Kerajinan</th>
                <th>Nilai Angka Kerapian</th>   
                <th>Nilai Huruf Kerapian</th>
                <th>Jum Sakit</th>
                <th>Jum Izin</th>
                <th>Tanpa Keterangan</th> --}}
                <th>Action</th>    
            </tr>
        </thead>
        <tbody>
            @foreach($nilaiKeaktifan->detail as $keaktifan)
                <tr>
                    <td width="100">{{ $keaktifan->santri->no_induk }}</td>
                    <td width="150">{{ $keaktifan->santri->nm_santri }}</td>
                    <td width="50">{{ $keaktifan->nilai_angka1 }}</td>
                    <td width="100">{{ $keaktifan->qiroatul_quran }}</td>
                    <td width="50">{{ $keaktifan->nilai_angka2 }}</td>
                    <td width="100">{{ $keaktifan->muhadhoroh }}</td>
                    <td width="50">{{ $keaktifan->nilai_angka3 }}</td>
                    <td width="100">{{ $keaktifan->maulid_diba }}</td>
                    <td width="50">{{ $keaktifan->nilai_angka4 }}</td>
                    <td width="70">{{ $keaktifan->kelakuan }}</td>
                    {{-- <td width="50">{{ $keaktifan->nilai_angka5 }}</td>
                    <td width="70">{{ $keaktifan->kerajinan }}</td> --}}
                    {{-- <td width="50">{{ $keaktifan->nilai_angka6 }}</td>
                    <td width="70">{{ $keaktifan->kerapian }}</td>
                    <td width="70">{{ $keaktifan->ket_sakit }}</td>
                    <td width="70">{{ $keaktifan->ket_izin }}</td>
                    <td width="70">{{ $keaktifan->tanpa_ket }}</td> --}}
                    <td>
                        {!! Form::open(['route' => ['detailNilaiKeaktifans.destroy', $keaktifan->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('detailNilaiKeaktifans.show', [$keaktifan->id]) }}" class='btn btn-info btn-xs'>Lihat Nilai</a>
                            <a href="{{ route('detailNilaiKeaktifans.edit', [$keaktifan->id]) }}" class='btn btn-warning btn-xs'>Edit</a>
                            {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu ingin menghapus data ini?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>