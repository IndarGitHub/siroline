@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Guru
        </h1>
    </section>
    <div class="content">
        <div class="box box-success">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('gurus.show_fields')
                    <a href="{{ route('gurus.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
