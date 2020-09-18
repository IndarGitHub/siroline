@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           Edit Data Guru
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($guru, ['route' => ['gurus.update', $guru->id], 'method' => 'patch']) !!}

                        @include('gurus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection