@extends('layouts.app')

@section('content')
    <section class="content-header">

        <div class="row">
            <div class="col-md-6">
                <h1 class="pull-left">Data Guru</h1>
            </div>
            <!-- search form (Optional) -->
            <div class="col-md-4 text-right">
                <form action="/search3" method="get">
                    <div class="input-group">
                        <input type="search3" name="search3" class="form-control" placeholder="Search..."/>
                        <span class="input-group-btn">
                       <a style="margin-top: -5px;margin-bottom: 5px">
                         <button type='submit' class="btn btn-success"><i class="fa fa-search"></i></button>
                       </a> 
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-md-2 text-right">
                <a class="btn btn-success pull-right" style="margin-top: 0px;margin-bottom: 5px" href="{{ route('gurus.create') }}">Tambahkan Data Guru</a>
            </div>
        </div>

    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                    @include('gurus.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

