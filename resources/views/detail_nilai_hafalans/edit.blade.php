@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Nilai Hafalan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detailNilaiHafalan, ['route' => ['detailNilaiHafalans.update', $detailNilaiHafalan->id], 'method' => 'patch']) !!}

                        @include('detail_nilai_hafalans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection