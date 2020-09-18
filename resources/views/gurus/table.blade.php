<div class="table-bordered">
    <table class="table" id="gurus-table">
        <thead>
            <tr>
                <th>Kode Guru</th>
                <th>Nama Guru</th>
                <th>Alamat Guru</th>
                <th>Telepon Guru</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($gurus as $guru)
            <tr>
                <td>{{ $guru->kode_guru }}</td>
                <td>{{ $guru->name }}</td>
                <td>{{ $guru->almt_guru }}</td>
                <td>{{ $guru->tlp_guru }}</td>
                <td>
                    {!! Form::open(['route' => ['gurus.destroy', $guru->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('gurus.show', [$guru->id]) }}" class='btn btn-info btn-xs'>Lihat</a>
                        <a href="{{ route('gurus.edit', [$guru->id]) }}" class='btn btn-warning btn-xs'>Edit</a>
                        {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $gurus->links() }}
</div>
