<div class="table-responsive">
    <table class="table" id="nilaiBacaAlqurans-table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Kelas </th>
                <th>Semester </th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilaiBacaAlqurans as $row=>$nilaiBacaAlquran)
            @if($nilaiBacaAlquran->kelas->guru_id == $wakelAlquran)
                <tr>
                <td>{{ $row +1 }}</td>
                <td>{{ $nilaiBacaAlquran->kelas->nm_kelas }}</td>
                <td>{{ $nilaiBacaAlquran->semester->semester }}</td>
                    <td>
                        <div style="overflow-x:auto;">
                            <a href="{{ route('nilaiBacaAlqurans.show', [$nilaiBacaAlquran->id]) }}" class='btn btn-info btn-xs'>Lihat Nilai</a>
                            @if(\App\Models\detail_nilai_baca_alquran::where('nilai_baca_alquran_id', $nilaiBacaAlquran->id)->first())
                            <a href="{{ route('nilaiBacaAlqurans.edit', [$nilaiBacaAlquran->id]) }}" class='btn btn-success disabled btn-xs'><i>Nilai sudah ada</i></a>
                            @else 
                            <a href="{{ route('nilaiBacaAlqurans.edit', [$nilaiBacaAlquran->id]) }}" class='btn btn-success btn-xs'>Masukkan Nilai</a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endif
            
            @if(Auth::user()->akses == 'admin')
            <tr>
                <td>{{ $row +1 }}</td>
                <td>{{ $nilaiBacaAlquran->kelas->nm_kelas }}</td>
                <td>{{ $nilaiBacaAlquran->semester->semester }}</td>
                    <td>
                        {!! Form::open(['route' => ['nilaiBacaAlqurans.destroy', $nilaiBacaAlquran->id], 'method' => 'delete']) !!}
                        <div style="overflow-x:auto;">
                            <a href="{{ route('nilaiBacaAlqurans.show', [$nilaiBacaAlquran->id]) }}" class='btn btn-info btn-xs'>Lihat Nilai</a>
                            @if(\App\Models\detail_nilai_baca_alquran::where('nilai_baca_alquran_id', $nilaiBacaAlquran->id)->first())
                            <a href="{{ route('nilaiBacaAlqurans.edit', [$nilaiBacaAlquran->id]) }}" class='btn btn-success disabled btn-xs'><i>Nilai sudah ada</i></a>
                            @else 
                            <a href="{{ route('nilaiBacaAlqurans.edit', [$nilaiBacaAlquran->id]) }}" class='btn btn-success btn-xs'>Masukkan Nilai</a>
                            @endif
                            {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endif
            @endforeach
            </tbody>
    </table>
</div>
