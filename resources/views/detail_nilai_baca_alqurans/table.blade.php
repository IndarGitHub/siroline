<div class="table-responsive">
    <table class="table" id="detailNilaiBacaAlqurans-table">
        <thead>
            <tr>
        <th>No Induk</th>
        <th>Nama Santri </th>
        {{-- <th>Nilai Baca Alquran Id</th> --}}
        <th>Nilai Tajwid</th>
        <th>Nilai Huruf</th>
        <th>Nilai Kelancaran</th>
        <th>Nilai Huruf</th>
        <th>Nilai Makhorijul</th>
        <th>Nilai Huruf</th>
        <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detailNilaiBacaAlqurans as $detailNilaiBacaAlquran)
            <tr>
            <td>{{ $detailNilaiBacaAlquran->santri->no_induk }}</td>
            <td>{{ $detailNilaiBacaAlquran->santri->nm_santri }}</td>
            {{-- <td>{{ $detailNilaiBacaAlquran->nilai_baca_alquran_id }}</td> --}}
            <td>{{ $detailNilaiBacaAlquran->tajwid }}</td>
            <td>{{ terbilang($detailNilaiBacaAlquran->tajwid) }}</td>
            <td>{{ $detailNilaiBacaAlquran->kelancaran }}</td>
            <td>{{ terbilang($detailNilaiBacaAlquran->kelancaran) }}</td>
            <td>{{ $detailNilaiBacaAlquran->makhorijul }}</td>
            <td>{{ terbilang($detailNilaiBacaAlquran->makhorijul) }}</td>
                <td>
                    {!! Form::open(['route' => ['detailNilaiBacaAlqurans.destroy', $detailNilaiBacaAlquran->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detailNilaiBacaAlqurans.show', [$detailNilaiBacaAlquran->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('detailNilaiBacaAlqurans.edit', [$detailNilaiBacaAlquran->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
