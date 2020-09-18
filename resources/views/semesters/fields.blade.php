<!-- Semester Field -->
<div class="form-group col-sm-6">
    {!! Form::label('semester', 'Semester:') !!}
    {!! Form::text('semester', null, ['class' => 'form-control']) !!}
</div>

<!-- Thn Ajaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('thn_ajaran', 'Tahun Ajaran:') !!}
    {!! Form::text('thn_ajaran', null, ['class' => 'form-control']) !!}
</div>

{{-- <div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('semesters.index') }}" class="btn btn-primary">Cancel</a>
</div>
