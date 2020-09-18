<div class="table-bordered">
    <table class="table" id="semesters-table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Status</th>
                <th>Semester</th>
                <th>Tahun Ajaran</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($semesters as $row=>$semester)
            <tr>
                <td>{{ $row +1 }}</td>
                <td>
                @if($semester->status == '1')
                    <a href="{{ url('semesters/status/'.$semester->id) }}" class="btn btn-sm btn-danger">Non Aktifkan</a>
                @else
                    <a href="{{ url('semesters/status/'.$semester->id) }}" class="btn btn-sm btn-success">Aktifkan</a>
                @endif
                </td>
                <td>{{ $semester->semester }}</td>
                <td>{{ $semester->thn_ajaran }}</td>
                <td><label class="label {{ ($semester->status == 1 ? 'label-success' : 'label-danger') }}">{{ ($semester->status == 1)
                ? 'Aktif' : 'Tidak Aktif'
                }}</label></td>
                <td>
                    {!! Form::open(['route' => ['semesters.destroy', $semester->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('semesters.show', [$semester->id]) }}" class='btn btn-info btn-xs'>Lihat</a>
                        <a href="{{ route('semesters.edit', [$semester->id]) }}" class='btn btn-warning btn-xs'>Edit</i></a>
                        {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $semesters->links() }}
</div>
