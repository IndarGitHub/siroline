<div class="table-responsive">
    <table class="table" id="nilaiHafalans-table">
        <thead>
            <tr>
            <th>Nomor</th>
            <th>Kelas</th>
            <th>Semester</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilaiHafalans as $row=>$nilaiHafalan)
                @if ($nilaiHafalan->kelas->guru_id == $wakel)
                <tr>
                <td>{{ $row +1 }}</td>
                <td>{{ $nilaiHafalan->kelas->nm_kelas }}</td>
                <td>{{ $nilaiHafalan->semester->semester }}</td>
                    <td>
                        <div style="overflow-x:auto;">
                            <a href="{{ route('nilaiHafalans.show', [$nilaiHafalan->id]) }}" class='btn btn-info btn-xs'>Lihat Nilai</a>
                            @if(\App\Models\detail_nilai_hafalan::where('nilai_hafalan_id', $nilaiHafalan->id)->first())
                                {{-- @if($nilaiHafalan->id == 1 ) --}}
                                <a href="{{ route('nilaiHafalans.edit', [$nilaiHafalan->id]) }}" class='btn btn-success disabled btn-xs'><i>Nilai sudah ada</i></a>
                                @else
                                <a href="{{ route('nilaiHafalans.edit', [$nilaiHafalan->id]) }}" class='btn btn-success btn-xs'>Masukkan Nilai</a>
                                @endif
                        </div>
                    </td>                
                </tr>
                @endif
    
                @if(Auth::user()->akses == 'admin')
                <tr>
                    <td>{{ $row +1 }}</td>
                    <td>{{ $nilaiHafalan->kelas->nm_kelas }}</td>
                    <td>{{ $nilaiHafalan->semester->semester }}</td>
                        <td>
                            {!! Form::open(['route' => ['nilaiHafalans.destroy', $nilaiHafalan->id], 'method' => 'delete']) !!}
                            <div style="overflow-x:auto;">
                                <a href="{{ route('nilaiHafalans.show', [$nilaiHafalan->id]) }}" class='btn btn-info btn-xs'>Lihat Nilai</a>
                                @if(\App\Models\detail_nilai_hafalan::where('nilai_hafalan_id', $nilaiHafalan->id)->first())
                                {{-- @if($nilaiHafalan->id == 1 ) --}}
                                <a href="{{ route('nilaiHafalans.edit', [$nilaiHafalan->id]) }}" class='btn btn-success disabled btn-xs'><i>Nilai sudah ada</i></a>
                                @else
                                <a href="{{ route('nilaiHafalans.edit', [$nilaiHafalan->id]) }}" class='btn btn-success btn-xs'>Masukkan Nilai</a>
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
