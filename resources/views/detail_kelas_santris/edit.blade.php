@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Kelas Santri
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detailKelasSantri, ['route' => ['detailKelasSantris.update', $detailKelasSantri->id], 'method' => 'patch']) !!}

                        @include('detail_kelas_santris.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection