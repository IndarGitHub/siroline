@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Nilai Ujian Tulis
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detailNilaiUjianTulis, ['route' => ['detailNilaiUjianTulis.update', $detailNilaiUjianTulis->id], 'method' => 'patch']) !!}

                        @include('detail_nilai_ujian_tulis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection