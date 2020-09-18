<div class="table-responsive">
    <table class="table" id="nilaiKeaktifans-table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Kelas </th>
                <th>Semester </th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilaiKeaktifans as $row=>$nilaiKeaktifan)
            @if($nilaiKeaktifan->kelas->guru_id == $wakelKeaktifan)
                <tr>
                    <td>{{ $row +1 }}</td>
                    <td>{{ $nilaiKeaktifan->kelas->nm_kelas }}</td>
                    <td>{{ $nilaiKeaktifan->semester->semester }}</td>
                    <td>
                        <div style="overflow-x:auto;">
                            <a href="{{ route('nilaiKeaktifans.show', [$nilaiKeaktifan->id]) }}" class='btn btn-info btn-xs'>Lihat Nilai</a>
                            @if(\App\Models\detail_nilai_keaktifan::where('nilai_keaktifan_id', $nilaiKeaktifan->id)->first())
                            <a href="{{ route('nilaiKeaktifans.edit', [$nilaiKeaktifan->id]) }}" class='btn btn-success disabled btn-xs'><i>Nilai sudah ada</i></a> 
                            @else
                            <a href="{{ route('nilaiKeaktifans.edit', [$nilaiKeaktifan->id]) }}" class='btn btn-success btn-xs'>Masukkan Nilai</a> 
                            @endif
                        </div>
                    </td>
                </tr>
            @endif
    
            @if(Auth::user()->akses == 'admin')
            <tr>
                <td>{{ $row +1 }}</td>
                <td>{{ $nilaiKeaktifan->kelas->nm_kelas }}</td>
                <td>{{ $nilaiKeaktifan->semester->semester }}</td>
                <td>
                    {!! Form::open(['route' => ['nilaiKeaktifans.destroy', $nilaiKeaktifan->id], 'method' => 'delete']) !!}
                    <div style="overflow-x:auto;">
                        <a href="{{ route('nilaiKeaktifans.show', [$nilaiKeaktifan->id]) }}" class='btn btn-info btn-xs'>Lihat Nilai</a>
                        @if(\App\Models\detail_nilai_keaktifan::where('nilai_keaktifan_id', $nilaiKeaktifan->id)->first())
                        <a href="{{ route('nilaiKeaktifans.edit', [$nilaiKeaktifan->id]) }}" class='btn btn-success disabled btn-xs'><i>Nilai sudah ada</i></a> 
                        @else
                        <a href="{{ route('nilaiKeaktifans.edit', [$nilaiKeaktifan->id]) }}" class='btn btn-success btn-xs'>Masukkan Nilai</a> 
                        @endif
                        {{-- <a href="{{ route('nilaiKeaktifans.edit', [$nilaiKeaktifan->id]) }}" class='btn btn-success btn-xs'>Masukkan Nilai</a> --}}
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
