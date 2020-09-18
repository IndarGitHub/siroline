@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Nilai Ujian Tulis</h1>
        <h1 class="pull-right">
            @if(Auth::user()->akses == 'admin')
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('nilaiUjianTulis.create') }}">Tambah Slot Kelas</a>
            @endif
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                    @include('nilai_ujian_tulis.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

