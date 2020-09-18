@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           Detail Mapel
        </h1>
    </section>
    <div class="content">
        <div class="box box-success">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('mapels.show_fields')
                    <a href="{{ route('mapels.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
