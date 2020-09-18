<!-- Santri Id Field -->
<div class="form-group">
    {!! Form::label('santri_id', 'Santri Id:') !!}
    <p>{{ $detailNilaiUjianTulis->santri->nm_santri }}</p>
</div>

<!-- Detail Mapel Id Field -->
<div class="form-group">
    {!! Form::label('detail_mapel_id', 'Detail Mapel Id:') !!}
    <p>{{ $detailNilaiUjianTulis->detail_mapel->mapel->nm_mapel }}</p>
</div>

<!-- Nilai Angka Field -->
<div class="form-group">
    {!! Form::label('nilai_angka', 'Nilai Angka:') !!}
    <p>{{ $detailNilaiUjianTulis->nilai_angka }}</p>
</div>

{{-- <!-- Nilai Huruf Field -->
<div class="form-group">
    {!! Form::label('nilai_huruf', 'Nilai Huruf:') !!}
    <p>{{ $detailNilaiUjianTulis->nilai_huruf }}</p>
</div> --}}


