<!-- Kode Tipe Field -->
<div class="form-group">
    {!! Form::label('kode_tp', 'Kode Tipe:') !!}
    <p>{{ $tp->kode_tp }}</p>
</div>

<!-- Tipe Pelanggaran Field -->
<div class="form-group">
    {!! Form::label('tipe_pelanggaran', 'Tipe Pelanggaran:') !!}
    <p>{{ $tp->tipe_pelanggaran }}</p>
</div>

<!-- Sanksi Pelanggaran Field -->
<div class="form-group">
    {!! Form::label('sanksi', 'Sanksi Yang Diberikan:') !!}
    <p>{{ $tp->sanksi }}</p>
</div>

