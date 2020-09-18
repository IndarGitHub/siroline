<!-- Kode_guru Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Kode Guru:') !!}
    {!! Form::text('kode_guru', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama Guru:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Alamat Guru:') !!}
    {!! Form::text('almt_guru', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Telepon Guru:') !!}
    {!! Form::text('tlp_guru', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('gurus.index') }}" class="btn btn-primary">Cancel</a>
</div>
