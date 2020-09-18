<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama User Pengguna:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Verified At Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::date('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div> --}}

@push('scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('akses', 'Akses:') !!}
    {{-- {!! Form::select('akses', null, ['class' => 'form-control']) !!} --}}
    <label class="radio-inline">
        {!! Form::radio('akses', 'admin') !!} Admin
    </label>
    <label class="radio-inline">
        {!! Form::radio('akses', 'guru') !!} Guru
    </label>
    <label class="radio-inline">
        {!! Form::radio('akses', 'walikelas') !!} Wali Kelas
    </label>
    <label class="radio-inline">
        {!! Form::radio('akses', 'kepalayayasan') !!} Kepala Yayasan
    </label>
    <label class="radio-inline">
        {!! Form::radio('akses', 'orangtua') !!} Orang Tua
    </label>
</div>

<!-- Remember Token Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-primary">Cancel</a>
</div>
