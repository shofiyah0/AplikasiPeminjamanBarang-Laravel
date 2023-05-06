@extends('adminlte::page')

@section('title', 'Tambah Alat')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Alat</h1>
@stop

@section('content')
<form action="/updatealat/{{$data->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Barang</label>
                        <input type="text" name="NamaBarang" class="form-control" id="exampleInputName" placeholder="Nama Barang" value="{{$data->NamaBarang}}">
                    </div>  
                    
                    <div class="form-group">
                        <label for="exampleInputName">Jumlah Barang</label>
                        <input type="text" name="JumlahBarang" class="form-control" id="exampleInputName" placeholder="Jumlah Barang" value="{{$data->JumlahBarang}}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="submit" class="btn btn-danger">Batal</button>
                </div>
            </div>
        </div>
    </div>
@stop
