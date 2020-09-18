<!-- Kelas Id Field -->
<div class="form-group">
    {!! Form::label('kelas_id', 'Kelas :') !!}
    <p>{{ $nilaiBacaAlquran->kelas->nm_kelas }}</p>
</div>

<!-- Semester Id Field -->
<div class="form-group">
    {!! Form::label('semester_id', 'Semester :') !!}
    <p>{{ $nilaiBacaAlquran->semester->semester }}</p>
</div>

<div class="form-group">
    <table class="table table-bordered table-condensed">
        <thead>
            <tr>
                {{-- <th>No Induk</th> --}}
                <th>Nama Santri</th>
                <th>Nilai Tajwid</th>
                <th>Nilai Huruf</th>
                <th>Nilai Kelancaran</th>
                <th>Nilai Huruf</th>
                <th>Nilai Makhorijul</th>
                <th>Nilai Huruf</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilaiBacaAlquran->detail as $nilai)
                <tr>
                    {{-- <td>{{ $nilai->santri->no_induk }}</td> --}}
                    <td>{{ $nilai->santri->nm_santri }}</td>
                    <td>{{ $nilai->tajwid }}</td>
                    <td>{{ terbilang($nilai->tajwid) }}</td>
                    <td>{{ $nilai->kelancaran }}</td>
                    <td>{{ terbilang($nilai->kelancaran) }}</td>
                    <td>{{ $nilai->makhorijul }}</td>
                    <td>{{ terbilang($nilai->makhorijul) }}</td>
                    <td>
                        {!! Form::open(['route' => ['detailNilaiBacaAlqurans.destroy', $nilai->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('detailNilaiBacaAlqurans.show', [$nilai->id]) }}" class='btn btn-info btn-xs'>Lihat</a>
                            <a href="{{ route('detailNilaiBacaAlqurans.edit', [$nilai->id]) }}" class='btn btn-warning btn-xs'>Edit</a>
                            {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu ingin menghapus data ini?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
