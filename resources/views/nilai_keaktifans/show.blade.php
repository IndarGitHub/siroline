@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nilai Keaktifan
        </h1>
    </section>
    <div class="content">
        <div class="box box-success">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('nilai_keaktifans.show_fields')
                    <a href="{{ route('nilaiKeaktifans.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
