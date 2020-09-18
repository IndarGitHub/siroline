@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Isikan Nilai Ujian Tulis
        </h1>
   </section>
   {{-- <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detailMapel, ['route' => ['detailMapels.update', $detailMapel->id], 'method' => 'patch']) !!}

                        @include('detail_mapels.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div> --}}

    <div class="content">
        @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'detailNilaiUjianTulis.store', 'method' => 'post']) !!}
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::model($detailMapel, ['route' => ['detailMapels.update', $detailMapel->id], 'method' => 'post']) !!}
                        <div class="form-group col-sm-6">
                            {!! Form::label('mapel_id', 'Mapel :') !!}
                            {!! Form::select('mapel_id', $mapels, null, ['class' => 'form-control']) !!}
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <td>Nomor Induk</td>
                                    <td>Nama Santri</td>
                                    <td>Nilai Angka</td>                                
                                    {{-- <td>Nilai Huruf</td> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datasantri as $key => $santri)
                                    <tr>
                                        <td>{{ $santri->no_induk }}</td>
                                        <td>
                                            {{ $santri->nm_santri }}
                                            <input type="hidden" name="santri_id[{{  $key }}]" value="{{ $santri->id }}">
                                            <input type="hidden" name="detail_mapel_id[{{  $key }}]" value="{{ request()->segment(3) }}">
                                        </td>
                                        <td width="200">
                                            <input type="text" name="nilai_angka[{{ $key }}]" class="form-control" value="{{ old('nilai_angka.' . $santri->id) }}">
                                            @if($errors->has("nilai_angka.$santri->id"))
                                                 <small class="text-danger">{{ $errors->first("nilai_angka.$santri->id") }}</small>
                                            @endif
                                        </td>                                       
                                        <td width="200">
                                            {{-- <td>{{terbilang($nilai->nilai_angka)}}</td> --}}
                                            {{-- <input type="text" name="nilai_huruf[{{ $key }}]" class="form-control" value="{{ $angka }}"> --}}
                                            {{-- <input type="text" name="nilai_huruf[{{ $angka ?? '' = nilai_angka[$key] }}]" class="form-control"> --}}
                                        </td>                                        
                                    </tr>
                                     @endforeach   
                            </tbody>
                        </table>
                        <div class="form-group">
                            {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
                            <a href="{{ route('nilaiUjianTulis.index') }}" class="btn btn-primary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>


@endsection