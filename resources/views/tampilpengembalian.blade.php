@extends('adminlte::page')

@section('title', 'Edit Data Pengembalian')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Pengembalian</h1>
@stop

@section('content')
<form action="/updatepengembalian/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="NamaBarang">Nama Barang</label>
                        <input type="text" name="NamaBarang" class="form-label" id="NamaBarang" placeholder="Nama Barang" value="{{ $data->NamaBarang }}" >
                    </div>  
                    <div class="form-group">
                        <label for="KodeBarang">Kode Barang</label>
                        <input type="text" name="KodeBarang" class="form-label" id="KodeBarang" placeholder="Kode Barang" value="{{ $data->KodeBarang }}" >
                    </div>
                    <div class="form-group">
                        <label for="JumlahBarang">Jumlah Barang</label>
                        <input type="text" name="JumlahBarang" class="form-label" id="JumlahBarang" placeholder="Jumlah Barang" value="{{$data->JumlahBarang}}">
                    </div>
                    <div class="form-group">
                        <label for="WaktuPengembalian">Waktu Pengembalian</label>
                        <input type="time" name="WaktuPengembalian" class="form-label" id="WaktuPengembalian" placeholder="Waktu Pengembalian" value="{{ $data->WaktuPengembalian }}" >
                    </div>
                    <div class="form-group">
                        <label for="StatusBarang">Status Barang</label>
                        <input type="text" name="StatusBarang" class="form-label" id="StatusBarang" placeholder="Status Barang" value="{{ $data->StatusBarang }}" >
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
