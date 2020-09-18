<div class="table-responsive">
    <table class="table" id="detailNilaiHafalans-table">
        <thead>
            <tr>
                <th>Santri</th>
        {{-- <th>Nilai Hafalan</th> --}}
        <th>Nilai Kelancaran</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detailNilaiHafalans as $detailNilaiHafalan)
            <tr>
                <td>{{ $detailNilaiHafalan->santri->nm_santri }}</td>
            {{-- <td>{{ $detailNilaiHafalan->nilai_hafalan_id }}</td> --}}
            <td>{{ $detailNilaiHafalan->kelancaran }}</td>
            <td>{{ terbilang($detailNilaiHafalan->kelancaran) }}</td>
            {{-- <td>{{ $detailNilaiHafalan->nilai_huruf }}</td> --}}
                <td>
                    {!! Form::open(['route' => ['detailNilaiHafalans.destroy', $detailNilaiHafalan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detailNilaiHafalans.show', [$detailNilaiHafalan->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('detailNilaiHafalans.edit', [$detailNilaiHafalan->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Apakah kamu benar akan menghapus data ini ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
