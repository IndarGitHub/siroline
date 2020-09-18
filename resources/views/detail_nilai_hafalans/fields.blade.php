<!-- Santri Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('santri_id', 'Santri :') !!}
    {!! Form::select('santri_id', $santris, null, ['class' => 'form-control']) !!}
</div>

<!-- Nilai Hafalan Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('nilai_hafalan_id', 'Nilai Hafalan Id:') !!}
    {!! Form::select('nilai_hafalan_id', $nilai_hafalans, null, ['class' => 'form-control']) !!}
</div> --}}

<!-- kelancaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kelancaran', 'Nilai Kelancaran :') !!}
    {!! Form::text('kelancaran', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Nilai Huruf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_huruf', 'Nilai Huruf:') !!}
    {!! Form::text('nilai_huruf', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('nilaiHafalans.index') }}" class="btn btn-primary">Cancel</a>
</div>
