@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Isikan Nilai Hafalan
    </h1>
    </section>
   {{-- <div class="content"> --}}
       
       {{-- <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nilaiHafalan, ['route' => ['nilaiHafalans.update', $nilaiHafalan->id], 'method' => 'patch']) !!}
                        <div class="form-group col-sm-6">
                            {!! Form::label('kelas_id', 'Kelas :') !!}
                            {!! Form::select('kelas_id', $kelas, old('kelas_id') , ['class' => 'form-control','placeholder'=>'Pilih Kelas...','value']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('semester_id', 'Semester :') !!}
                            {!! Form::select('semester_id', $semesters, null, ['class' => 'form-control','placeholder'=>'Pilih Semester...']) !!}
                        </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div> --}}
   {{-- </div> --}}

   {{-- // menambahkan tabel nilai inputan --}}

    <div class="content">
        @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'detailNilaiHafalans.store', 'method' => 'post']) !!}
        <input type="hidden" name="nilai_hafalan_id" value="{{ $nilaiHafalan->id }}">
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::model($nilaiHafalan, ['route' => ['nilaiHafalans.update', $nilaiHafalan->id], 'method' => 'post']) !!}
                        <div class="form-group col-sm-6">
                            {!! Form::label('kelas_id', 'Kelas :') !!}
                            {!! Form::select('kelas_id', $kelas, old('kelas_id') , ['class' => 'form-control','placeholder'=>'Pilih Kelas...','value']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('semester_id', 'Semester :') !!}
                            {!! Form::select('semester_id', $semesters, null, ['class' => 'form-control','placeholder'=>'Pilih Semester...']) !!}
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <td>Nomor Induk</td>
                                    <td>Nama Santri </td>
                                    <td>Nilai Kelancaran</td>
                                    {{-- <td>Nilai Huruf</td> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilaiHafalan->kelas->santri as $santri)
                                    <tr>
                                        <td>{{ $santri->no_induk }}</td>
                                        <td>{{ $santri->nm_santri }}</td>
                                        <td width="300">
                                        <input type="text" name="nilai_kelancaran[{{ $santri->id }}]" class="form-control" value="{{ old('nilai_kelancaran.' . $santri->id) }}">
                                            @if($errors->has("nilai_kelancaran.$santri->id"))
                                                 <small class="text-danger">{{ $errors->first("nilai_kelancaran.$santri->id") }}</small>
                                            @endif
                                        </td>
                                        {{-- <td width="300">
                                            <input type="text" name="nilai_huruf[{{ $santri->id }}]" class="form-control">
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group">
                            {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
                            <a href="{{ route('nilaiHafalans.index') }}" class="btn btn-primary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection