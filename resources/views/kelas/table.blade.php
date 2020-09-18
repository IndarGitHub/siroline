<div class="table-responsive">
    <table class="table" id="kelas-table">
        <thead>
            <tr>
                <th>Kode_Kelas</th>
                <th>Nama Kelas</th>
                <th>Wali Kelas</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($kelas as $kelas)
            <tr>
                <td>{{ $kelas->kode_kls }}</td>
                <td>{{ $kelas->nm_kelas }}</td>
                <td>{{ $kelas->guru->name }}</td>
                <td>
                    {!! Form::open(['route' => ['kelas.destroy', $kelas->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('kelas.show', [$kelas->id]) }}" class='btn btn-info btn-xs'>Lihat</i></a>
                        <a href="{{ route('kelas.edit', [$kelas->id]) }}" class='btn btn-warning btn-xs'>Edit</a>
                        {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- {{ $kelas->links() }} --}}
</div>
