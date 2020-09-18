<!-- Kelas Id Field -->
<div class="form-group">
    {!! Form::label('kelas_id', 'Kelas :') !!}
    <p>{{ $nilaiUjianTulis->kelas->nm_kelas }}</p>
</div>

<!-- Semester Id Field -->
<div class="form-group">
    {!! Form::label('semester_id', 'Semester :') !!}
    <p>{{ $nilaiUjianTulis->semester->semester }}</p>
</div>


<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Mata Pelajaran</th>
                        <th>Action</th>                                  
                    </tr>
                </thead>
                <tbody>
                    @foreach($nilaiUjianTulis->detail as $row=>$nilai)
                    @if($nilai->mapel->guru_id == $gurus)
                        <tr>
                            <td>{{ $row +1 }}</td>
                            <td>{{ $nilai->mapel->nm_mapel }}</td>
                            <td>
                                <div style="overflow-x:auto;">
                                    <a href="{{ route('detailMapels.show', [$nilai->id]) }}" class='btn btn-info btn-xs'>Lihat Nilai</a>
                                    @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'guru' || Auth::user()->akses == 'walikelas' || Auth::user()->akses == 'kepalayayasan')
                                    @if(\App\Models\detail_nilai_ujian_tulis::where('detail_mapel_id', $nilai->id)->first())
                                    <a href="{{ route('detailMapels.isiNilai', ['id_kelas' => $nilaiUjianTulis->kelas->id, 'id_detail_mapel' => $nilai->id]) }}" class='btn btn-success disabled btn-xs'><i>Nilai sudah ada</i></i></a>
                                    @else
                                    <a href="{{ route('detailMapels.isiNilai', ['id_kelas' => $nilaiUjianTulis->kelas->id, 'id_detail_mapel' => $nilai->id]) }}" class='btn btn-success btn-xs'>Masukkan Nilai</i></a> 
                                    @endif
                                    @endif 
                                </div>
                            </td>                        
                        </tr>
                        @endif
                        @if(Auth::user()->akses == 'admin')
                        <tr>
                            <td>{{ $row +1 }}</td>
                            <td>{{ $nilai->mapel->nm_mapel }}</td>
                            <td>
                                {!! Form::open(['route' => ['detailMapels.destroy', $nilai->id], 'method' => 'delete']) !!}
                                <div style="overflow-x:auto;">
                                    <a href="{{ route('detailMapels.show', [$nilai->id]) }}" class='btn btn-info btn-xs'>Lihat Nilai</a>
                                    @if(\App\Models\detail_nilai_ujian_tulis::where('detail_mapel_id', $nilai->id)->first())
                                    <a href="{{ route('detailMapels.isiNilai', ['id_kelas' => $nilaiUjianTulis->kelas->id, 'id_detail_mapel' => $nilai->id]) }}" class='btn btn-success disabled btn-xs'><i>Nilai sudah ada</i></i></a>
                                    @else
                                    <a href="{{ route('detailMapels.isiNilai', ['id_kelas' => $nilaiUjianTulis->kelas->id, 'id_detail_mapel' => $nilai->id]) }}" class='btn btn-success btn-xs'>Masukkan Nilai</i></a> 
                                    @endif
                                    {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah anda yakin ingin menghapus ini ?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>    
                        </tr>
                        @endif
                    @endforeach   
                </tbody>
            </table>
        </div>
    </div>
</div>