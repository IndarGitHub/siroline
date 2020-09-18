<div class="table-responsive">
    <table class="table" id="detailKelasSantris-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor induk</th>
                <th>Nama Santri </th>
                <th>Kode Kelas</th>
                <th>Nama Kelas </th>
                {{-- <th colspan="3">Action</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach($data as $row=>$detail)
            <tr>
                <td>{{ $row +1 }}</td>
                <td>{{ $detail->no_induk }}</td>
                <td>{{ $detail->nm_santri }}</td>
                <td>{{ $detail->kode_kls }}</td>
                <td>{{ $detail->nm_kelas }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- {{ $detailKelasSantris->links() }} --}}
</div>
