<!-- Santri Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('santri_id', 'Nama Santri :') !!}
    {!! Form::select('santri_id', $santris, null, ['class' => 'form-control']) !!}
</div>

<!-- Nilai Keaktifan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_keaktifan_id', 'Nilai Keaktifan :') !!}
    {!! Form::select('nilai_keaktifan_id', $nilai_keaktifans, null, ['class' => 'form-control']) !!}
</div>

<!-- Nilai Angka Qiroatul Qur'an -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_angka1', 'Nilai Angka QQ :') !!}
    {!! Form::text('nilai_angka1', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Qiroatul Quran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qiroatul_quran', 'Qiroatul Quran:') !!}
    {!! Form::text('qiroatul_quran', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Nilai Angka Muhadhoroh -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_angka2', 'Nilai Angka Muh :') !!}
    {!! Form::text('nilai_angka2', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Muhadhoroh Field -->
<div class="form-group col-sm-6">
    {!! Form::label('muhadhoroh', 'Muhadhoroh:') !!}
    {!! Form::text('muhadhoroh', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Nilai Angka Diba -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_angka3', 'Nilai Angka Diba :') !!}
    {!! Form::text('nilai_angka3', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Maulid Diba Field -->
<div class="form-group col-sm-6">
    {!! Form::label('maulid_diba', 'Maulid Diba:') !!}
    {!! Form::text('maulid_diba', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Nilai Angka Kelakuan -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_angka4', 'Nilai Angka Kelakuan :') !!}
    {!! Form::text('nilai_angka4', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Kelakuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kelakuan', 'Kelakuan:') !!}
    {!! Form::text('kelakuan', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Nilai Angka Kerajinan -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_angka5', 'Nilai Angka Kerajinan :') !!}
    {!! Form::text('nilai_angka5', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Kerajinan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kerajinan', 'Kerajinan:') !!}
    {!! Form::text('kerajinan', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Nilai Angka Kerapian -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_angka6', 'Nilai Angka Kerapian :') !!}
    {!! Form::text('nilai_angka6', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Kerapian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kerapian', 'Kerapian:') !!}
    {!! Form::text('kerapian', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Sakit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ket_sakit', 'Sakit :') !!}
    {!! Form::text('ket_sakit', null, ['class' => 'form-control']) !!}
</div>

<!-- Izin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ket_izin', 'Izin :') !!}
    {!! Form::text('ket_izin', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanpa Ket Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanpa_ket', 'Tanpa Keterangan :') !!}
    {!! Form::text('tanpa_ket', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('detailNilaiKeaktifans.index') }}" class="btn btn-primary">Cancel</a>
</div>
