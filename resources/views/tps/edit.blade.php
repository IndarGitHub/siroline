@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit Data Jenis Pelanggaran
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tp, ['route' => ['tps.update', $tp->id], 'method' => 'patch']) !!}

                        @include('tps.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection