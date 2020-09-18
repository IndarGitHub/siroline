<!-- No Induk Field -->
<div class="form-group col-sm-2">
    {!! Form::label('no_induk', 'Nomor Induk :') !!}
    {!! Form::text('no_induk', null, ['class' => 'form-control']) !!}
</div>

<!-- Nm Santri Field -->
<div class="form-group col-sm-5">
    {!! Form::label('nm_santri', 'Nama Santri :') !!}
    {!! Form::text('nm_santri', null, ['class' => 'form-control']) !!}
</div>

<!-- Tmp Lhr Field -->
<div class="form-group col-sm-7">
    {!! Form::label('tmp_lhr', 'Tempat Lahir :') !!}
    {!! Form::text('tmp_lhr', null, ['class' => 'form-control']) !!}
</div>

<!-- Tgl Lhr Field -->
<div class="form-group col-sm-7">
    {!! Form::label('tgl_lhr', 'Tanggal Lahir :') !!}
    {!! Form::date('tgl_lhr', date('y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Jk Field -->
<div class="form-group col-sm-12">
    {!! Form::label('jk', 'Jenis Kelamin:') !!}
    <label class="radio-inline">
        {!! Form::radio('jk', "1", null) !!} laki-laki
    </label>

    <label class="radio-inline">
        {!! Form::radio('jk', "0", null) !!} perempuan
    </label>
</div>

<!-- Kelas Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('kelas_id', 'Kelas :') !!}
    {!! Form::select('kelas_id', $kelas, null, ['class' => 'form-control','placeholder'=>'Pilih Kelas...']) !!}
</div>
<div class="form-group col-sm-12">
</div>
<!-- Nm Ayah Field -->
<div class="form-group col-sm-4">
    {!! Form::label('nm_ayah', 'Nama Ayah :') !!}
    {!! Form::text('nm_ayah', null, ['class' => 'form-control']) !!}
</div>
<!-- Nm Ibu Field -->
<div class="form-group col-sm-4">
    {!! Form::label('nm_ibu', 'Nama Ibu :') !!}
    {!! Form::text('nm_ibu', null, ['class' => 'form-control']) !!}
</div>
<!-- Nm Wali Santri Field -->
<div class="form-group col-sm-4">
    {!! Form::label('nm_wali_santri', 'Nama Wali Santri :') !!}
    {!! Form::text('nm_wali_santri', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('santris.index') }}" class="btn btn-primary">Cancel</a>
</div>
