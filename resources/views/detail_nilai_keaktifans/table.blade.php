<div class="table-responsive">
    <table class="table" id="detailNilaiKeaktifans-table">
        <thead>
            <tr>
        <th>Nama Santri </th>
        <th>Nilai Keaktifan </th>
        <th>Nilai Angka QQ</th>
        <th>Qiroatul Quran</th>
        <th>Nilai Angka Muhadhoroh</th>
        <th>Muhadhoroh</th>
        <th>Nilai Angka Diba</th>
        <th>Maulid Diba</th>
        {{-- <th>Nilai Angka Kelakuan</th>
        <th>Kelakuan</th>
        <th>Nilai Angka Kerajinan</th>
        <th>Kerajinan</th>
        <th>Nilai Angka Kerapian</th>
        <th>Kerapian</th>
        <th>Ket Sakit</th>
        <th>Ket Izin</th>
        <th>Tanpa Ket</th> --}}
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detailNilaiKeaktifans as $detailNilaiKeaktifan)
            <tr>
            <td>{{ $detailNilaiKeaktifan->santri->nm_santri }}</td>
            <td>{{ $detailNilaiKeaktifan->nilai_keaktifan_id }}</td>
            <td>{{ $detailNilaiKeaktifan->nilai_angka1 }}</td>
            <td>{{ $detailNilaiKeaktifan->qiroatul_quran }}</td>
            <td>{{ $detailNilaiKeaktifan->nilai_angka2 }}</td>
            <td>{{ $detailNilaiKeaktifan->muhadhoroh }}</td>
            <td>{{ $detailNilaiKeaktifan->nilai_angka3 }}</td>
            <td>{{ $detailNilaiKeaktifan->maulid_diba }}</td>
            {{-- <td>{{ $detailNilaiKeaktifan->nilai_angka4 }}</td>
            <td>{{ $detailNilaiKeaktifan->kelakuan }}</td>
            <td>{{ $detailNilaiKeaktifan->nilai_angka5 }}</td>
            <td>{{ $detailNilaiKeaktifan->kerajinan }}</td>
            <td>{{ $detailNilaiKeaktifan->nilai_angka6 }}</td>
            <td>{{ $detailNilaiKeaktifan->kerapian }}</td>
            <td>{{ $detailNilaiKeaktifan->ket_sakit }}</td>
            <td>{{ $detailNilaiKeaktifan->ket_izin }}</td>
            <td>{{ $detailNilaiKeaktifan->tanpa_ket }}</td> --}}
                <td>
                    {!! Form::open(['route' => ['detailNilaiKeaktifans.destroy', $detailNilaiKeaktifan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detailNilaiKeaktifans.show', [$detailNilaiKeaktifan->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('detailNilaiKeaktifans.edit', [$detailNilaiKeaktifan->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
