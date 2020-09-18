@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Isilah Nilai Keaktifan Santri
        </h1>
   </section>
   {{-- <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nilaiKeaktifan, ['route' => ['nilaiKeaktifans.update', $nilaiKeaktifan->id], 'method' => 'patch']) !!}

                        @include('nilai_keaktifans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div> --}}

  {{-- Menambahkan tabel detail nilai baca alqu'an --}}
  {{-- <section class="content-header">
    <h1>
        Isilah Nilai Keaktifan Santri
    </h1>
    </section> --}}
    <div class="content">
        {!! Form::open(['route' => 'detailNilaiKeaktifans.store', 'method' => 'post']) !!}
        @include('adminlte-templates::common.errors')
        <input type="hidden" name="nilai_keaktifan_id" value="{{ $nilaiKeaktifan->id }}">
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::model($nilaiKeaktifan, ['route' => ['nilaiKeaktifans.update', $nilaiKeaktifan->id], 'method' => 'post']) !!}
                        <div class="form-group col-sm-6">
                            {!! Form::label('kelas_id', 'Pilih Kelas :') !!}
                            {!! Form::select('kelas_id', $kelas, null, ['class' => 'form-control','placeholder'=>'Pilih Kelas....']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('semester_id', 'Pilih Semester :') !!}
                            {!! Form::select('semester_id', $semesters, null, ['class' => 'form-control','placeholder'=>'Pilih Semester...']) !!}
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <td>No Induk</td>
                                    <td>Nama Santri</td>
                                    <td>Nilai Angka QQ</td>
                                    {{-- <td>Nilai Huruf QQ</td> --}}
                                    <td>Nilai Angka Muhadhoroh</td>
                                    {{-- <td>Nilai huruf Muhadhoroh</td> --}}
                                    <td>Nilai Angka Diba</td>                                
                                    {{-- <td>Nilai Huruf Diba</td> --}}
                                    <td>Nilai Angka kelakuan</td>
                                    {{-- <td>Nilai Huruf Kelakuan</td> --}}
                                    <td>Nilai Angka Kerajinan</td>
                                    {{-- <td>Nilai Huruf Kerajinan</td> --}}
                                    <td>Nilai Angka Kerapian</td>   
                                    {{-- <td>Nilai Huruf Kerapian</td> --}}
                                    <td>Jum Sakit</td>
                                    <td>Jum Izin</td>
                                    <td>Tanpa Keterangan</td>                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilaiKeaktifan->kelas->santri as $santri)
                                    <tr>
                                        <td>{{ $santri->no_induk }}</td>
                                        <td>{{ $santri->nm_santri }}</td>
                                        <td width="70">
                                            <input type="text" name="nilai_angka_qiroa[{{ $santri->id }}]" class="form-control" value="{{ old('nilai_angka_qiroa.' . $santri->id) }}">
                                            @if($errors->has("nilai_angka_qiroa.$santri->id"))
                                                <small class="text-danger">{{ $errors->first("nilai_angka_qiroa.$santri->id") }}</small>
                                            @endif
                                        </td>
                                        {{-- <td width="20">
                                            <input type="text" name="nilai_huruf_qiroa[{{ $santri->id }}]" class="form-control">
                                        </td> --}}
                                        <td width="70">
                                            <input type="text" name="nilai_angka_muhadhoroh[{{ $santri->id }}]" class="form-control" value="{{ old('nilai_angka_muhadhoroh.' . $santri->id) }}">
                                            @if($errors->has("nilai_angka_muhadhoroh.$santri->id"))
                                                <small class="text-danger">{{ $errors->first("nilai_angka_muhadhoroh.$santri->id") }}</small>
                                            @endif
                                        </td>
                                        {{-- <td width="20">
                                            <input type="text" name="nilai_huruf_muhadhoroh[{{ $santri->id }}]" class="form-control">
                                        </td>   --}}
                                        <td width="70">
                                            <input type="text" name="nilai_angka_diba[{{ $santri->id }}]" class="form-control" value="{{ old('nilai_angka_diba.' . $santri->id) }}">
                                            @if($errors->has("nilai_angka_diba.$santri->id"))
                                                <small class="text-danger">{{ $errors->first("nilai_angka_diba.$santri->id") }}</small>
                                            @endif
                                        </td>                                     
                                        {{-- <td width="20">
                                            <input type="text" name="nilai_huruf_diba[{{ $santri->id }}]" class="form-control">
                                        </td> --}}
                                        <td width="70">
                                            <input type="text" name="nilai_angka_kelakuan[{{ $santri->id }}]" class="form-control" value="{{ old('nilai_angka_kelakuan.' . $santri->id) }}">
                                            @if($errors->has("nilai_angka_kelakuan.$santri->id"))
                                                <small class="text-danger">{{ $errors->first("nilai_angka_kelakuan.$santri->id") }}</small>
                                            @endif
                                        </td>
                                        {{-- <td width="20">
                                            <input type="text" name="nilai_huruf_kelakuan[{{ $santri->id }}]" class="form-control">
                                        </td>                                    --}}
                                        <td width="70">
                                            <input type="text" name="nilai_angka_kerajinan[{{ $santri->id }}]" class="form-control" value="{{ old('nilai_angka_kerajinan.' . $santri->id) }}">
                                            @if($errors->has("nilai_angka_kerajinan.$santri->id"))
                                                <small class="text-danger">{{ $errors->first("nilai_angka_kerajinan.$santri->id") }}</small>
                                            @endif
                                        </td>
                                        {{-- <td width="20">
                                            <input type="text" name="nilai_huruf_kerajinan[{{ $santri->id }}]" class="form-control">
                                        </td> --}}
                                        <td width="70">
                                            <input type="text" name="nilai_angka_kerapian[{{ $santri->id }}]" class="form-control" value="{{ old('nilai_angka_kerapian.' . $santri->id) }}">
                                            @if($errors->has("nilai_angka_kerapian.$santri->id"))
                                                <small class="text-danger">{{ $errors->first("nilai_angka_kerapian.$santri->id") }}</small>
                                            @endif
                                        </td> 
                                        {{-- <td width="20">
                                            <input type="text" name="nilai_huruf_kerapian[{{ $santri->id }}]" class="form-control">
                                        </td> --}}
                                        <td width="70">
                                            <input type="text" name="ket_sakit[{{ $santri->id }}]" class="form-control" value="{{ old('ket_sakit.' . $santri->id) }}">
                                            @if($errors->has("ket_sakit.$santri->id"))
                                                <small class="text-danger">{{ $errors->first("ket_sakit.$santri->id") }}</small>
                                            @endif
                                        </td>
                                        <td width="70">
                                            <input type="text" name="ket_izin[{{ $santri->id }}]" class="form-control" value="{{ old('ket_izin.' . $santri->id) }}">
                                            @if($errors->has("ket_izin.$santri->id"))
                                                <small class="text-danger">{{ $errors->first("ket_izin.$santri->id") }}</small>
                                            @endif
                                        </td>
                                        <td width="70">
                                            <input type="text" name="tanpa_ket[{{ $santri->id }}]" class="form-control" value="{{ old('tanpa_ket.' . $santri->id) }}">
                                            @if($errors->has("tanpa_ket.$santri->id"))
                                                <small class="text-danger">{{ $errors->first("tanpa_ket.$santri->id") }}</small>
                                            @endif
                                        </td>                                                                               
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group">
                            {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
                            <a href="{{ route('nilaiKeaktifans.index') }}" class="btn btn-primary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection