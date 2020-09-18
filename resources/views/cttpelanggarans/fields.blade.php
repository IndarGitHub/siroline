<div class="form-group col-sm-12">
</div>
<!-- Santri Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('santri_id', 'Nama Santri :') !!}
    {!! Form::select('santri_id', $santris, null, ['class' => 'form-control','placeholder'=>'Pilih Nama Santri']) !!}
</div>
<div class="form-group col-sm-12">
</div>
<!-- Tgl Field -->
<div class="form-group col-sm-4">
    {!! Form::label('tgl', 'Tanggal Pelanggaran :') !!}
    {!! Form::date('tgl', date('y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Tp Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tp_id', 'Jenis Pelanggaran:') !!}
    {!! Form::select('tp_id', $tps, null, ['class' => 'form-control','placeholder'=>'Pilih Jenis Pelanggaran...']) !!}
</div> 

<div class="form-group col-sm-12">
</div> 
<!-- Catatan Pengasuh Field -->
<div class="form-group col-sm-6">
    {!! Form::label('catatan_pengasuh', 'Catatan Pengasuh:') !!}
    {!! Form::textarea('catatan_pengasuh', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('cttpelanggarans.index') }}" class="btn btn-primary">Cancel</a>
</div>
