@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rapor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($rapor, ['route' => ['rapors.update', $rapor->id], 'method' => 'patch']) !!}

                        @include('rapors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection