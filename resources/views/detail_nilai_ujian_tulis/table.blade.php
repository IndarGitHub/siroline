<div class="table-responsive">
    <table class="table" id="detailNilaiUjianTulis-table">
        <thead>
            <tr>
        <th>Santri </th>
        <th>Detail Mapel </th>
        <th>Nilai Angka</th>
        {{-- <th>Nilai Huruf</th> --}}
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detailNilaiUjianTulis as $detailNilaiUjianTulis)
            <tr>
                <td>{{ $detailNilaiUjianTulis->santri->nm_santri }}</td>
            <td>{{ $detailNilaiUjianTulis->detail_mapel->mapel->nm_mapel }}</td>
            <td>{{ $detailNilaiUjianTulis->nilai_angka }}</td>
            <td>{{ terbilang($detailNilaiUjianTulis->nilai_angka) }}</td>
            {{-- <td>{{ $detailNilaiUjianTulis->nilai_huruf }}</td> --}}
                <td>
                    {!! Form::open(['route' => ['detailNilaiUjianTulis.destroy', $detailNilaiUjianTulis->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detailNilaiUjianTulis.show', [$detailNilaiUjianTulis->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('detailNilaiUjianTulis.edit', [$detailNilaiUjianTulis->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
