<div class="table-responsive">
    <table class="table" id="nilaiUjianTulis-table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Kelas </th>
                <th>Semester </th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($nilaiUjianTulis as $row=>$nilaiUjianTulis)
        @if($gurus = $nilaiUjianTulis->kelas->nm_kelas)
            <tr>
            <td>{{ $row +1 }}</td>
            <td>{{ $nilaiUjianTulis->kelas->nm_kelas }}</td>
            <td>{{ $nilaiUjianTulis->semester->semester }}</td>
                <td>
                    {!! Form::open(['route' => ['nilaiUjianTulis.destroy', $nilaiUjianTulis->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('nilaiUjianTulis.show', [$nilaiUjianTulis->id]) }}" class='btn btn-info btn-xs'>Info Mata Pelajaran</a>
                        @if(Auth::user()->akses == 'admin')
                        <a href="{{ route('nilaiUjianTulis.edit', [$nilaiUjianTulis->id]) }}" class='btn btn-warning btn-xs'>Edit</a>
                        {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endif
        @endforeach
        </tbody>
    </table>
</div>
