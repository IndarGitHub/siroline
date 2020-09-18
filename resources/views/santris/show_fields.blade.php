<!-- No Induk Field -->
<div class="form-group">
    {!! Form::label('no_induk', 'Nomor Induk:') !!}
    <p>{{ $santri->no_induk }}</p>
</div>

<!-- Nm Santri Field -->
<div class="form-group">
    {!! Form::label('nm_santri', 'Nama Santri :') !!}
    <p>{{ $santri->nm_santri }}</p>
</div>

<!-- Tmp Lhr Field -->
<div class="form-group">
    {!! Form::label('tmp_lhr', 'Tempat Lahir :') !!}
    <p>{{ $santri->tmp_lhr }}</p>
</div>

<!-- Tgl Lhr Field -->
<div class="form-group">
    {!! Form::label('tgl_lhr', 'Tanggal Lahir :') !!}
    <p>{{ $santri->tgl_lhr }}</p>
</div>

<!-- Jk Field -->
<div class="form-group">
    {!! Form::label('jk', 'Jenis Kelamin :') !!}
    <p>{{ $santri->jk }}</p>
</div>

<!-- Kelas Id Field -->
<div class="form-group">
    {!! Form::label('kelas_id', 'Kelas :') !!}
    <p>{{ $santri->kelas->nm_kelas }}</p>
</div>
<!-- Nm Ayah Field -->
<div class="form-group">
    {!! Form::label('nm_ayah', 'Nama Ayah :') !!}
    <p>{{ $santri->nm_ayah }}</p>
</div>
<!-- Nm Ibu Field -->
<div class="form-group">
    {!! Form::label('nm_ibu', 'Nama Ibu :') !!}
    <p>{{ $santri->nm_ibu }}</p>
</div>
<!-- Nm Wali Santri Field -->
<div class="form-group">
    {!! Form::label('nm_wali_santri', 'Nama Wali Santri :') !!}
    <p>{{ $santri->nm_wali_santri }}</p>
</div>

