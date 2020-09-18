<!-- Santri Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('santri_id', 'Nama Santri :') !!}
    {!! Form::select('santri_id', $santris, null, ['class' => 'form-control','placeholder'=>'Pilih Nama Santri....']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('detailKelasSantris.index') }}" class="btn btn-primary">Cancel</a>
</div>
