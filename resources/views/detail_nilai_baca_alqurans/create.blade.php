@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Nilai Baca Alquran
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'detailNilaiBacaAlqurans.store']) !!}

                        @include('detail_nilai_baca_alqurans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
