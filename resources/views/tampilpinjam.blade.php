@extends('adminlte::page')

@section('title', 'Edit Data Peminjaman Barang')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Peminjaman Barang</h1>
@stop

@section('content')
<form action="/updatepinjam/{{ $data->idPinjam }}" method="POST" enctype="multipart/form-data">
                    @csrf
<br>
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                    </div>

                        <!-- Nama Peminjam -->
                        <div class="form-group">
                            <label for="NamaPeminjam" class="form-label">Nama Peminjam</label>
                            <input type="text" id="NamaPeminjam" name="NamaPeminjam" class="form-control" placeholder="Nama Peminjam" value="{{ $data->NamaPeminjam }}">
                        </div>

                        <!-- Nomor Induk -->
                        <div class="form-group">
                        <label for="NomorInduk" class="form-label">Nomor Induk</label>
                            <input type="text"  id="NomorInduk" name="NomorInduk" class="form-control" placeholder="Nomor Induk" value="{{ $data->NomorInduk }}">
                        </div>

                        <!-- Waktu Peminjaman -->
                        <div class="form-group">
                            <label for="WaktuPeminjaman" class="form-label">Waktu Peminjaman</label>
                            <input type="time"  id="WaktuPeminjaman" name="WaktuPeminjaman" class="form-control" placeholder="Waktu Peminjaman" value="{{ $data->WaktuPeminjaman}}">
                        </div>

                        <!-- Tanggal Peminjaman -->
                        <div class="form-group">
                            <label for="TanggalPeminjaman" class="form-label">Tanggal Peminjaman</label>
                            <input type="date"  id="TanggalPeminjaman" name="TanggalPeminjaman" class="form-control" placeholder="Tanggal Peminjaman" value="{{ $data->TanggalPinjam}}">
                        </div>


                        <!-- Lokasi Pinjam -->
                        <div class="form-group">
                            <label for="LokasiPinjam" class="form-label">Lokasi Pinjam</label>
                            <input type="text"  id="LokasiPinjam" name="LokasiPinjam" class="form-control" placeholder="Lokasi Pinjam" value="{{ $data->LokasiPinjam}}">
                        </div>

                        <!-- Kode Barang -->
                        <div class="form-group">
                        <label for="KodeBarang" class="form-label">Kode Barang</label>
                            <input type="text"  id="KodeBarang" name="KodeBarang" class="form-control" placeholder="Kode Barang" value="{{ $data->KodeBarang}}">
                        </div>

                        <!-- Jumlah Barang -->
                        <div class="form-group">
                            <label for="JumlahBarang" class="form-label">Jumlah Barang</label>
                            <input type="text"  id="JumlahBarang" name="JumlahBarang" class="form-control" placeholder="Jumlah Barang" value="{{ $data->JumlahBarang}}">
                        </div>

                        <!-- Submit -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="submit" class="btn btn-danger">Batal</button>
                        </div>

                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

