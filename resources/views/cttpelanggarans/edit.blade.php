@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Catatan Pelanggaran
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cttpelanggaran, ['route' => ['cttpelanggarans.update', $cttpelanggaran->id], 'method' => 'patch']) !!}

                        @include('cttpelanggarans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection