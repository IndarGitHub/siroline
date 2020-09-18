<!-- Santri Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('santri_id', 'Santri :') !!}
    {!! Form::select('santri_id', $santris, null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Nilai Baca Alquran Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_baca_alquran_id', 'Nilai Baca Alquran Id:') !!}
    {!! Form::select('nilai_baca_alquran_id', $nilai_baca_alqurans, null, ['class' => 'form-control']) !!}
</div> --}}

<!-- tajwid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tajwid', 'Nilai Tajwid :') !!}
    {!! Form::text('tajwid', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Nilai Huruf Tajwid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tajwid_huruf', 'Nilai Huruf:') !!}
    {!! Form::text('tajwid_huruf', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- kelancaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kelancaran', 'Nilai Kelancaran :') !!}
    {!! Form::text('kelancaran', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Nilai Huruf Kelancaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kel_huruf', 'Nilai Huruf:') !!}
    {!! Form::text('kel_huruf', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- makhorijul Field -->
<div class="form-group col-sm-6">
    {!! Form::label('makhorijul', 'Nilai Makhorijul :') !!}
    {!! Form::text('makhorijul', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Nilai Huruf Makhorijul Field -->
<div class="form-group col-sm-6">
    {!! Form::label('makho_huruf', 'Nilai Huruf:') !!}
    {!! Form::text('makho_huruf', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('nilaiBacaAlqurans.index') }}" class="btn btn-primary">Cancel</a>
</div>
