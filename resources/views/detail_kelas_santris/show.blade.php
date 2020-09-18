@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Kelas Santri
        </h1>
    </section>
    <div class="content">
        <div class="box box-success">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('detail_kelas_santris.show_fields')
                    <a href="{{ route('detailKelasSantris.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
