<div class="table-responsive">
    <table class="table" id="mapels-table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Kode Mapel</th>
                <th>Nama Mapel</th>
                <th>Nama Guru</th>
                <th>Nama Kelas</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mapels as $row=>$mapel)
            <tr>
                <td>{{ $row +1 }}</td>
                <td>{{ $mapel->kode_mapel }}</td>
                <td>{{ $mapel->nm_mapel }}</td>
            <td>{{ $mapel->guru->name }}</td>
            <td>{{ $mapel->kelas->nm_kelas }}</td>
                <td>
                    {!! Form::open(['route' => ['mapels.destroy', $mapel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('mapels.show', [$mapel->id]) }}" class='btn btn-info btn-xs'>Lihat</a>
                        <a href="{{ route('mapels.edit', [$mapel->id]) }}" class='btn btn-warning btn-xs'>Edit</i></a>
                        {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $mapels->links() }}
</div>
