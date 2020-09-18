<!-- Kelas Id Field -->
<div class="form-group">
    {!! Form::label('kelas_id', 'Kelas :') !!}
    <p>{{ $nilaiHafalan->kelas->nm_kelas }}</p>
</div>

<!-- Semester Id Field -->
<div class="form-group">
    {!! Form::label('semester_id', 'Semester :') !!}
    <p>{{ $nilaiHafalan->semester->semester }}</p>
</div>

<div class="form-group">
    <table class="table table-bordered table-condensed">
        <thead>
            <tr>
                <th>Nama Santri</th>
                <th>Nilai Kelancaran</th>
                <th>Nilai Huruf</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilaiHafalan->detail as $kelancaran)
                <tr>
                    <td>{{ $kelancaran->santri->nm_santri }}</td>
                    <td>{{ $kelancaran->kelancaran }}</td>
                    {{-- <td>{{ $kelancaran->nilai_huruf }}</td> --}}
                    <td>{{terbilang($kelancaran->kelancaran)}}</td>
                    <td>
                        {!! Form::open(['route' => ['detailNilaiHafalans.destroy', $kelancaran->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('detailNilaiHafalans.show', [$kelancaran->id]) }}" class='btn btn-info btn-xs'>Lihat</a>
                            <a href="{{ route('detailNilaiHafalans.edit', [$kelancaran->id]) }}" class='btn btn-warning btn-xs'>Edit</a>
                            {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu ingin menghapus data ini ?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

