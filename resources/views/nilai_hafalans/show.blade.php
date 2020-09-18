@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           Detail Nilai Hafalan
        </h1>
    </section>
    <div class="content">
        <div class="box box-success">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('nilai_hafalans.show_fields')
                    <a href="{{ route('nilaiHafalans.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
