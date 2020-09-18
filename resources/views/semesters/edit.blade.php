@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit Data Semester
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($semester, ['route' => ['semesters.update', $semester->id], 'method' => 'patch']) !!}

                        @include('semesters.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection