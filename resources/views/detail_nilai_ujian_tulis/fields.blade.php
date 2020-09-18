<!-- Santri Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('santri_id', 'Santri :') !!}
    {!! Form::select('santri_id', $santris, null, ['class' => 'form-control']) !!}
</div>

<!-- Detail Mapel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('detail_mapel_id', 'Detail Mapel :') !!}
    {!! Form::select('detail_mapel_id', $detail_mapels, null, ['class' => 'form-control']) !!}
</div>

<!-- Nilai Angka Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_angka', 'Nilai Angka:') !!}
    {!! Form::text('nilai_angka', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Nilai Huruf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_huruf', 'Nilai Huruf:') !!}
    {!! Form::text('nilai_huruf', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('detailNilaiUjianTulis.index') }}" class="btn btn-default">Cancel</a>
</div>
