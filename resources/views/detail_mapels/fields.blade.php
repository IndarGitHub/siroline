{{-- <!-- Nilai Ujian Tulis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_ujian_tulis_id', 'Nilai Ujian Tulis :') !!}
    {!! Form::select('nilai_ujian_tulis_id', $nilai_ujian_tulis, null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Mapel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mapel_id', 'Mapel :') !!}
    {!! Form::select('mapel_id', $mapels, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('nilaiUjianTulis.index') }}" class="btn btn-primary">Cancel</a>
</div>
