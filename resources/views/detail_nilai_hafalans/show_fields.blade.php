<!-- Santri Id Field -->
<div class="form-group">
    {!! Form::label('santri_id', 'Santri :') !!}
    <p>{{ $detailNilaiHafalan->santri->nm_santri }}</p>
</div>

<!-- Nilai Hafalan Id Field -->
<div class="form-group">
    {!! Form::label('nilai_hafalan_id', 'Nilai Hafalan Id:') !!}
    <p>{{ $detailNilaiHafalan->nilai_hafalan_id }}</p>
</div>

<!-- Kelancaran Field -->
<div class="form-group">
    {!! Form::label('kelancaran', 'Nilai Kelancaran :') !!}
    <p>{{ $detailNilaiHafalan->kelancaran }}</p>
</div>

<!-- Nilai Huruf Field -->
<div class="form-group">
    {!! Form::label('nilai_huruf', 'Nilai Huruf:') !!}
    <p>{{ $detailNilaiHafalan->nilai_huruf }}</p>
</div>