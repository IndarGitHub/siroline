<div class="table-responsive">
    <table class="table" id="tps-table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Kode Tipe</th>
                <th>Tipe Pelanggaran</th>
                <th>Sanksi Yang Diberikan</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tps as $row=>$tp)
            <tr>
                <td>{{ $row +1 }}</td>
                <td>{{ $tp->kode_tp }}</td>
                <td>{{ $tp->tipe_pelanggaran }}</td>
                <td>{{ $tp->sanksi }}</td>
                <td>
                    {!! Form::open(['route' => ['tps.destroy', $tp->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{-- <a href="{{ route('tps.show', [$tp->id]) }}" class='btn btn-info btn-xs'>Lihat</a> --}}
                        <a href="{{ route('tps.edit', [$tp->id]) }}" class='btn btn-warning btn-xs'>Edit</a>
                        {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $tps->links() }}
</div>
