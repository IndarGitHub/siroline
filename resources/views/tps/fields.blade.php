<!-- kode Tipe Pelanggaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_tp', 'Kode Tipe:') !!}
    {!! Form::text('kode_tp', null, ['class' => 'form-control']) !!}
</div>
<!-- Tipe Pelanggaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipe_pelanggaran', 'Tipe Pelanggaran:') !!}
    {!! Form::text('tipe_pelanggaran', null, ['class' => 'form-control']) !!}
</div>
<!-- Sanksi Field -->
<div class="form-group col-sm-5">
    {!! Form::label('sanksi', 'Sanksi Yang Diberikan:') !!}
    {!! Form::textarea('sanksi', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('tps.index') }}" class="btn btn-primary">Cancel</a>
</div>
