@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Nilai Keaktifan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detailNilaiKeaktifan, ['route' => ['detailNilaiKeaktifans.update', $detailNilaiKeaktifan->id], 'method' => 'patch']) !!}

                        @include('detail_nilai_keaktifans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection