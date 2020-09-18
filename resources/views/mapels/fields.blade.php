<!-- Kode Mapel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_mapel', 'Kode Mapel :') !!}
    {!! Form::text('kode_mapel', null, ['class' => 'form-control']) !!}
</div>

<!-- Nm Mapel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nm_mapel', 'Nama Mapel :') !!}
    {!! Form::text('nm_mapel', null, ['class' => 'form-control']) !!}
</div>

<!-- Guru Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guru_id', 'Guru :') !!}
    {!! Form::select('guru_id', $gurus, null, ['class' => 'form-control','placeholder'=>'Pilih Guru Pengampu....']) !!}
</div>

<!-- Kelas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kelas_id', 'Kelas :') !!}
    {!! Form::select('kelas_id', $kelas, null, ['class' => 'form-control','placeholder'=>'Pilih Kelas....']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('mapels.index') }}" class="btn btn-primary">Cancel</a>
</div>
