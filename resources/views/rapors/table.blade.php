<div class="table-responsive">
    <table class="table" id="rapors-table">
        <thead>
            @if(Auth::user()->akses == 'orangtua')
            <tr>
                <th>Nomor</th>
                <th>No.Induk</th>
                <th>Nama Santri</th>
                <th>Kelas</th>
                <th>Semester</th>
                <th>Tahun AJaran</th>
                <th>Action</th>
            @endif
            @if(Auth::user()->akses == 'admin')
            <tr>
                <th>Nomor</th>
                <th>No.Induk</th>
                <th>Nama Santri</th>
                <th>Kelas</th>
                <th>Semester</th>
                <th>Tahun AJaran</th>
                <th>Action</th>
            @endif
            </tr>
        </thead>
        <tbody>
            @if(Auth::user()->akses == 'orangtua')
            @foreach($data as $row=>$detail)
                <tr>
                    <td>{{ $row +1 }}</td>
                    <td>{{ $detail->no_induk }}</td>
                    <td>{{ $detail->nm_santri }}</td>
                    <td>{{ $detail->nm_kelas }}</td>
                    <td>{{ $detail->semester }}</td>
                    <td>{{ $detail->thn_ajaran }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="/rapor-pdf" class='btn btn-primary btn-xs'>Lihat Rapor</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            @endif
            @if(Auth::user()->akses == 'admin')
            @foreach($dataDetail as $row=> $detail)
            <tr>
                <td>{{ $row +1 }}</td>
                <td>{{ $detail->no_induk }}</td>
                <td>{{ $detail->nm_santri }}</td>
                <td>{{ $detail->nm_kelas }}</td>
                <td>{{ $detail->semester }}</td>
                <td>{{ $detail->thn_ajaran }}</td>
                <td>
                    <div class="btn-group">
                        {{-- {!! Form::open(['route' => ['rapors.destroy', $rapor->id], 'method' => 'delete']) !!} --}}
                        {{-- <a href="{{ route('rapors.show',[$rapor->id]) }}" class='btn btn-primary btn-xs'>Cetak Rapor</a> --}}
                        {{-- <a href="{{ route('rapors.pdf') }}" class='btn btn-primary btn-xs'>Lihat Rapor</a> --}}
                        <a href="{{ route('rapor.pdf', $detail->santri_id) }}" class='btn btn-primary btn-xs'>Cetak Rapor</a>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif

            @if(Auth::user()->akses == 'guru' || Auth::user()->akses == 'walikelas')
            @foreach($raporWakel as $row=> $detail)
                <tr>
                    <td>{{ $row +1 }}</td>
                    <td>{{ $detail->no_induk }}</td>
                    <td>{{ $detail->nm_santri }}</td>
                    <td>{{ $detail->nm_kelas }}</td>
                    <td>{{ $detail->semester }}</td>
                    <td>{{ $detail->thn_ajaran }}</td>
                    <td>
                        <div class="btn-group">
                            {{-- {!! Form::open(['route' => ['rapors.destroy', $rapor->id], 'method' => 'delete']) !!} --}}
                            {{-- <a href="{{ route('rapors.show',[$rapor->id]) }}" class='btn btn-primary btn-xs'>Cetak Rapor</a> --}}
                            {{-- <a href="{{ route('rapors.pdf') }}" class='btn btn-primary btn-xs'>Lihat Rapor</a> --}}
                            <a href="{{ route('rapor.pdf', $detail->santri_id) }}" class='btn btn-primary btn-xs'>Cetak Rapor</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
        {{-- <tbody>
        @foreach($rapors as $rapor)
            <tr>
            <td>{{ $rapor->detail_nilai_ujian_tulis->santri->nm_santri }}</td>
            <td>{{ $rapor->detail_mapel->mapel->nm_mapel }}</td>
            <td>{{ $rapor->detail_nilai_hafalan->santri->nm_santri }}</td>
            <td>{{ $rapor->detail_nilai_baca_alquran->santri->nm_santri }}</td>
            <td>{{ $rapor->detail_nilai_keaktifan->santri->nm_santri }}</td>
            <td>{{ $rapor->rata_rata }}</td>
                <td>
                    {!! Form::open(['route' => ['rapors.destroy', $rapor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('rapors.show', [$rapor->id]) }}" class='btn btn-info btn-xs'>Detail Nilai</a>
                        <a href="{{ route('rapors.edit', [$rapor->id]) }}" class='btn btn-warning btn-xs'>Edit</a>
                        {!! Form::button('<a class="btn-danger btn-x">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    <a href="/rapor-pdf" class='btn btn-primary btn-xs'>Lihat Rapor</a>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody> --}}
    </table>
    {{-- {{ $rapors->links() }} --}}
</div>
