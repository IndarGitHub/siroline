{{-- <!-- Kode Pelanggaran Field -->
<div class="form-group">
    {!! Form::label('kode_pelanggaran', 'Kode Pelanggaran:') !!}
    <p>{{ $cttpelanggaran->kode_pelanggaran }}</p>
</div>
<!-- Santri Id Field -->
<div class="form-group">
    {!! Form::label('santri_id', 'Santri :') !!}
    <p>{{ $cttpelanggaran->santri->nm_santri }}</p>
</div>

<!-- Tgl Field -->
<div class="form-group">
    {!! Form::label('tgl', 'Tanggal:') !!}
    <p>{{ $cttpelanggaran->tgl }}</p>
</div>

<!-- Tp Id Field -->
<div class="form-group">
    {!! Form::label('tp_id', 'Jenis Pelanggaran:') !!}
    <p>{{ $cttpelanggaran->tp->tipe_pelanggaran }}</p>
</div>
<!-- Catatan Pengasuh Field -->
<div class="form-group">
    {!! Form::label('catatan_pengasuh', 'Catatan Pengasuh:') !!}
    <p>{{ $cttpelanggaran->catatan_pengasuh }}</p>
</div> --}}

<div class="form-group">
    <table class="table table-bordered table-condensed">
        <thead>
            <tr>
                <th>Nama Santri</th>
                <th>Tanggaal Pelanggaran</th>
                <th>Jenis Pelanggaran</th>
                <th>Sanksi Diterima</th>
                <th>Catatan Pengasuh</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>{{ $cttpelanggaran->santri->nm_santri }}</td>
                <td>{{ tgl_indo($cttpelanggaran->tgl) }}</td>
                <td>{{ $cttpelanggaran->tp->tipe_pelanggaran }}</td>
                <td>{{ $cttpelanggaran->tp->sanksi }}</td>
                <td>{{ $cttpelanggaran->catatan_pengasuh }}</td>
            </tr>
        </tbody>
    </table>
</div>
