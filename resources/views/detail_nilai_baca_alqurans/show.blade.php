@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Nilai Baca Alquran
        </h1>
    </section>
    <div class="content">
        <div class="box box-success">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('detail_nilai_baca_alqurans.show_fields')
                    <a href="{{ route('nilaiBacaAlqurans.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
