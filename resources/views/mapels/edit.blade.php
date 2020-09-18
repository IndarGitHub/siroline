@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           Edit Data Mapel
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($mapel, ['route' => ['mapels.update', $mapel->id], 'method' => 'patch']) !!}

                        @include('mapels.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection