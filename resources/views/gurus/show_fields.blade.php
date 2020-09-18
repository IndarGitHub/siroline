<!-- Kode Guru Field -->
<div class="form-group">
    {!! Form::label('name', 'Kode Guru :') !!}
    <p>{{ $guru->kode_guru }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nama Guru :') !!}
    <p>{{ $guru->name }}</p>
</div>

<!-- Almt_Guru Field -->
<div class="form-group">
    {!! Form::label('name', 'Alamat Guru :') !!}
    <p>{{ $guru->almt_guru }}</p>
</div>

<!-- Tlp Field -->
<div class="form-group">
    {!! Form::label('name', 'Telepon Guru :') !!}
    <p>{{ $guru->tlp_guru }}</p>
</div>
