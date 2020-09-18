@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Isi Nilai Harian Baca Alqu'an
    </h1>
    </section>
   {{-- <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nilaiBacaAlquran, ['route' => ['nilaiBacaAlqurans.update', $nilaiBacaAlquran->id], 'method' => 'patch']) !!}

                        @include('nilai_baca_alqurans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div> --}}
   {{-- Menambahkan tabel detail nilai baca alqu'an --}}
   
    <div class="content">
        @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'detailNilaiBacaAlqurans.store', 'method' => 'post']) !!}
        <input type="hidden" name="nilai_baca_alquran_id" value="{{ $nilaiBacaAlquran->id }}">
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::model($nilaiBacaAlquran, ['route' => ['nilaiBacaAlqurans.update', $nilaiBacaAlquran->id], 'method' => 'post']) !!}
                        <div class="form-group col-sm-6">
                            {!! Form::label('kelas_id', 'Kelas :') !!}
                            {!! Form::select('kelas_id', $kelas, null, ['class' => 'form-control','placeholder'=>'Pilih Kelas...']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('semester_id', 'Semester :') !!}
                            {!! Form::select('semester_id', $semesters, null, ['class' => 'form-control','placeholder'=>'Pilih Semester']) !!}
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <td>Nomor Induk</td>
                                    <td>Nama Santri</td>
                                    <td>Nilai Tajwid</td>
                                    {{-- <td>Nilai Huruf</td>--}}
                                    <td>Nilai Kelancaran</td>
                                    {{-- <td>Nilai Huruf</td> --}}
                                    <td>Nilai Makhorijul</td>   
                                    {{-- <td>Nilai Huruf</td>--}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilaiBacaAlquran->kelas->santri as $santri)
                                    <tr>
                                        <td>{{ $santri->no_induk }}</td>
                                        <td>{{ $santri->nm_santri }}</td>
                                        <td width="100">
                                            <input type="text" name="nilai_tajwid[{{ $santri->id }}]" class="form-control" value="{{ old('nilai_tajwid.' . $santri->id) }}">
                                            @if($errors->has("nilai_tajwid.$santri->id"))
                                                 <small class="text-danger">{{ $errors->first("nilai_tajwid.$santri->id") }}</small>
                                            @endif
                                        </td>  
                                        {{-- <td width="200">
                                            <input type="text" name="tajwid_huruf[{{ $santri->id }}]" class="form-control">
                                        </td>                                      --}}
                                        <td width="100">
                                            <input type="text" name="nilai_kelancaran[{{ $santri->id }}]" class="form-control" value="{{ old('nilai_kelancaran.' . $santri->id) }}">
                                            @if($errors->has("nilai_kelancaran.$santri->id"))
                                                 <small class="text-danger">{{ $errors->first("nilai_kelancaran.$santri->id") }}</small>
                                            @endif
                                        </td>
                                        {{-- <td width="200">
                                            <input type="text" name="kel_huruf[{{ $santri->id }}]" class="form-control">
                                        </td>                                    --}}
                                        <td width="100">
                                            <input type="text" name="nilai_makhorijul[{{ $santri->id }}]" class="form-control" value="{{ old('nilai_makhorijul.' . $santri->id) }}">
                                            @if($errors->has("nilai_makhorijul.$santri->id"))
                                                 <small class="text-danger">{{ $errors->first("nilai_makhorijul.$santri->id") }}</small>
                                            @endif
                                        </td> 
                                        {{-- <td width="200">
                                            <input type="text" name="makho_huruf[{{ $santri->id }}]" class="form-control">
                                        </td>                                                                                --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group">
                            {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
                            <a href="{{ route('nilaiBacaAlqurans.index') }}" class="btn btn-primary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>



@endsection