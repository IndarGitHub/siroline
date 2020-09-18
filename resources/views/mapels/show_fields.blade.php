<!-- Kode Mapel Field -->
<div class="form-group">
    {!! Form::label('kode_mapel', 'Kode Mapel:') !!}
    <p>{{ $mapel->kode_mapel }}</p>
</div>

<!-- Nm Mapel Field -->
<div class="form-group">
    {!! Form::label('nm_mapel', 'Nama Mapel:') !!}
    <p>{{ $mapel->nm_mapel }}</p>
</div>

<!-- Guru Id Field -->
<div class="form-group">
    {!! Form::label('guru_id', 'Nama Guru:') !!}
    <p>{{ $mapel->guru->name }}</p>
</div>

<!-- Kelas Id Field -->
<div class="form-group">
    {!! Form::label('kelas_id', 'Nama Kelas:') !!}
    <p>{{ $mapel->kelas->nm_kelas }}</p>
</div>
