<!-- Kode Kelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_kls', 'Kode Kelas:') !!}
    {!! Form::text('kode_kls', null, ['class' => 'form-control']) !!}
</div>

<!-- Nm Kelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nm_kelas', 'Nama Kelas:') !!}
    {!! Form::text('nm_kelas', null, ['class' => 'form-control']) !!}
</div>

<!-- Guru Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guru_id', 'Wali Kelas :') !!}
    {!! Form::select('guru_id', $gurus, null, ['class' => 'form-control','placeholder'=>'Pilih Wali Kelas....']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('kelas.index') }}" class="btn btn-primary">Cancel</a>
</div>
