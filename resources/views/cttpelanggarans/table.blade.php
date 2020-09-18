<div class="table-bordered">
    <table class="table" id="cttpelanggarans-table">
        <thead>
            <tr>
                <th>Nomor</th>
        <th>Nama Santri </th>
        <th>Tanggal Pelanggaran</th>
        {{-- <th>Jenis Pelanggaran</th>
        <th>Catatan Pengasuh</th> --}}
                <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(Auth::user()->akses == 'orangtua')
        @foreach($ctt1 as $row=>$cttpelanggaran)
            <tr>
                <td>{{ $row +1 }}</td>
            <td>{{ $cttpelanggaran->nm_santri }}</td>
            <td>{{ tgl_indo($cttpelanggaran->tgl) }}</td>
            {{-- <td>{{ $cttpelanggaran->tp->tipe_pelanggaran }}</td>
            <td>{{ $cttpelanggaran->catatan_pengasuh }}</td> --}}
                <td>
                    {!! Form::open(['route' => ['cttpelanggarans.destroy', $cttpelanggaran->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cttpelanggarans.show', [$cttpelanggaran->id]) }}" class='btn btn-info btn-xs'>Lihat Pelanggaran</a>
                        @if(Auth::user()->akses == 'orangtua')
                        <a class="btn btn-warning btn-xs" href="/tatib-pdf">Lihat Tata Tertib</a>
                        @endif
                        @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'guru' || Auth::user()->akses == 'walikelas' || Auth::user()->akses == 'kepalayayasan')
                        <a href="{{ route('cttpelanggarans.edit', [$cttpelanggaran->id]) }}" class='btn btn-warning btn-xs'>Edit</a>
                        {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        @endif

        @if(Auth::user()->akses == 'admin'|| Auth::user()->akses == 'guru' || Auth::user()->akses == 'walikelas' ||  Auth::user()->akses == 'kepalayayasan')
        @foreach($cttpelanggarans as $row=>$cttpelanggaran)
            <tr>
                <td>{{ $row +1 }}</td>
            <td>{{ $cttpelanggaran->santri->nm_santri }}</td>
            <td>{{ tgl_indo($cttpelanggaran->tgl) }}</td>
            {{-- <td>{{ $cttpelanggaran->tp->tipe_pelanggaran }}</td>
            <td>{{ $cttpelanggaran->catatan_pengasuh }}</td> --}}
                <td>
                    {!! Form::open(['route' => ['cttpelanggarans.destroy', $cttpelanggaran->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cttpelanggarans.show', [$cttpelanggaran->id]) }}" class='btn btn-info btn-xs'>Lihat Pelanggaran</a>
                        @if(Auth::user()->akses == 'orangtua')
                        <a class="btn btn-warning btn-xs" href="/tatib-pdf">Lihat Tata Tertib</a>
                        @endif
                        @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'guru' || Auth::user()->akses == 'walikelas' || Auth::user()->akses == 'kepalayayasan')
                        <a href="{{ route('cttpelanggarans.edit', [$cttpelanggaran->id]) }}" class='btn btn-warning btn-xs'>Edit</a>
                        {!! Form::button('<a class="btn-danger btn-xs">Hapus</a>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        @endif

        </tbody>
    </table>
    {{ $cttpelanggarans->links() }}
</div>
