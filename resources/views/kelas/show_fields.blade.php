<!-- Kode Kelas Field -->
<div class="form-group">
    {!! Form::label('kode_kls', 'Kode Kelas:') !!}
    <p>{{ $kelas->nm_kelas }}</p>
</div>

<!-- Nm Kelas Field -->
<div class="form-group">
    {!! Form::label('nm_kelas', 'Nama Kelas:') !!}
    <p>{{ $kelas->nm_kelas }}</p>
</div>

<!-- Guru Id Field -->
<div class="form-group">
    {!! Form::label('guru_id', 'Nama Wali Kelas:') !!}
    <p>{{ $kelas->guru->name }}</p>
</div>