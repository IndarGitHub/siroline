<!-- Kelas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kelas_id', 'Kelas :') !!}
    {!! Form::select('kelas_id', $kelas, null, ['class' => 'form-control','placeholder'=>'Pilih Kelas...']) !!}
</div>

<!-- Semester Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('semester_id', 'Semester :') !!}
    {!! Form::select('semester_id', $semesters, null, ['class' => 'form-control','placeholder'=>'Pilih Semester']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('nilaiBacaAlqurans.index') }}" class="btn btn-primary">Cancel</a>
</div>
