{{-- <!-- Nilai Ujian Tulis Id Field -->
<div class="form-group">
    {!! Form::label('nilai_ujian_tulis_id', 'Nilai Ujian Tulis Id:') !!}
    <p>{{ $detailMapel->nilai_ujian_tulis_id }}</p>
</div> --}}

<!-- Mapel Id Field -->
<div class="form-group">
    {!! Form::label('mapel_id', 'Nama Mata Pelajaran:') !!}
    <p>{{ $detailMapel->mapel->nm_mapel }}</p>
</div>


<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nomor Induk</th>
                        <th>Nama Santri</th>
                        <th>Nilai Angka</th>                                
                        <th>Nilai Huruf</th>
                        <th>Action</th>                                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($detailMapel->detail as $nilai )
                        <tr>
                            <td>{{ $nilai->santri->no_induk }}</td>
                            <td>{{ $nilai->santri->nm_santri }}</td>
                            <td>{{ $nilai->nilai_angka }}</td>
                            {{-- <td>{{ $nilai->nilai_huruf }}</td> --}}
                            <td>{{terbilang($nilai->nilai_angka)}}</td>
                             <td>
                                    {!! Form::open(['route' => ['detailNilaiUjianTulis.destroy', $nilai->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'guru' || Auth::user()->akses == 'walikelas')
                                        <a href="{{ route('detailNilaiUjianTulis.show', [$nilai->id]) }}" class='btn btn-info btn-xs'>Lihat</a>
                                        <a href="{{ route('detailNilaiUjianTulis.edit', [$nilai->id]) }}" class='btn btn-warning btn-xs'>Edit</a>
                                        {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        @endif
                                    </div>
                                    {!! Form::close() !!}
                            </td>                                       
                        </tr>
                    @endforeach   
                </tbody>
            </table>
        </div>
    </div>
</div>
