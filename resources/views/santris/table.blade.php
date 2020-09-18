<div class="table table-bordered">
    <table class="table" id="santris-table">
        <thead>
            <tr>
        <th>No Induk</th>
        <th>Nama Santri</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Kelas</th>
        <th>Nama Ayah</th>
        <th>Nama Ibu</th>
        <th>Wali Santri</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($santris as $santri)
            <tr>
                <td>{{ $santri->no_induk }}</td>
            <td>{{ $santri->nm_santri }}</td>
            <td>{{ $santri->tmp_lhr }}</td>
            <td>{{ tgl_indo($santri->tgl_lhr) }}</td>
            <td>{{ $santri->jk == 1 ? 'Laki - Laki' : 'Perempuan'}}</td>
            <td>{{ $santri->kelas->nm_kelas }}</td>
            <td>{{ $santri->nm_ayah }}</td>
            <td>{{ $santri->nm_ibu }}</td>
            <td>{{ $santri->nm_wali_santri }}</td>
                <td>
                    {!! Form::open(['route' => ['santris.destroy', $santri->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('santris.show', [$santri->id]) }}" class='btn btn-info btn-xs'>Lihat</a>
                        <a href="{{ route('santris.edit', [$santri->id]) }}" class='btn btn-warning btn-xs'>Edit</a>
                        {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $santris->links() }}
</div>
