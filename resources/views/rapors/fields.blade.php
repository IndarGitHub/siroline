<!-- Detail Nilai Ujian Tulis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('detail_nilai_ujian_tulis_id', 'Detail Nilai Ujian Tulis Id:') !!}
    {!! Form::select('detail_nilai_ujian_tulis_id', $detail_nilai_ujian_tulis, null, ['class' => 'form-control']) !!}
</div>

<!-- Detail Mapel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('detail_mapel_id', 'Detail Mapel Id:') !!}
    {!! Form::select('detail_mapel_id', $detail_mapels, null, ['class' => 'form-control']) !!}
</div>

<!-- Detail Nilai Hafalan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('detail_nilai_hafalan_id', 'Detail Nilai Hafalan Id:') !!}
    {!! Form::select('detail_nilai_hafalan_id', $detail_nilai_hafalans, null, ['class' => 'form-control']) !!}
</div>

<!-- Detail Nilai Baca Alquran Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('detail_nilai_baca_alquran_id', 'Detail Nilai Baca Alquran Id:') !!}
    {!! Form::select('detail_nilai_baca_alquran_id', $detail_nilai_baca_alqurans, null, ['class' => 'form-control']) !!}
</div>

<!-- Detail Nilai Keaktifan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('detail_nilai_keaktifan_id', 'Detail Nilai Keaktifan Id:') !!}
    {!! Form::select('detail_nilai_keaktifan_id', $detail_nilai_keaktifans, null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Rata Rata Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rata_rata', 'Rata Rata:') !!}
    {!! Form::text('rata_rata', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('rapors.index') }}" class="btn btn-default">Cancel</a>
</div>
