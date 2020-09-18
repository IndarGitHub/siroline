<div class="table-bordered">
    <table class="table" id="detailMapels-table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nilai Ujian Dikelas</th>
                <th>Mapel </th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detailMapels as $row=>$detailMapel)
            <tr>
                <td>{{ $row +1 }}</td>
                <td>{{ $detailMapel->nilai_ujian_tulis->kelas->nm_kelas }}</td>
                <td>{{ $detailMapel->mapel->nm_mapel }}</td>
                <td>
                    {!! Form::open(['route' => ['detailMapels.destroy', $detailMapel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detailMapels.show', [$detailMapel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('detailMapels.edit', [$detailMapel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
