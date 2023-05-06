@extends('adminlte::page')

@section('title', 'Tambah Pinjam')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Pinjam</h1>
@stop

@section('content')
<form action="/insertpinjam" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">

                    <!-- Nama Peminjam -->
                    <div class="form-group">
                        <label for="NamaPeminjam" class="form-label">Nama Peminjam</label>
                        <input type="text" id="NamaPeminjam" name="NamaPeminjam" class="form-control" placeholder="Nama Peminjam" required>
                        <div class="invalid-feedback">
                            Please fill out this field
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Nomor Induk</label>
                        <input type="text" name="NomorInduk" class="form-control" id="exampleInputName" placeholder="Nomor Induk" required>
                        <div class="invalid-feedback">
                                Please fill out this field
                        </div> 
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Waktu Peminjaman</label>
                        <input type="time" name="WaktuPeminjaman" class="form-control" id="exampleInputName" placeholder="Waktu Peminjaman" required>
                        <div class="invalid-feedback">
                                Please fill out this field
                        </div> 
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Tanggal Peminjaman</label>
                        <input type="date" name="TanggalPinjam" class="form-control" id="exampleInputName" placeholder="Tanggal Peminjaman" required>
                        <div class="invalid-feedback">
                                Please fill out this field
                        </div> 
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Lokasi Pinjam</label>
                        <input type="text" name="LokasiPinjam" class="form-control" id="exampleInputName" placeholder="Lokasi Pinjam" required>
                        <div class="invalid-feedback">
                            Please fill out this field
                        </div> 
                    </div>
                    
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" name="KodeBarang" class="form-control" id="exampleInputName" placeholder="Kode Barang" required>
                       <div class="invalid-feedback">
                                Please fill out this field
                        </div>                     
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputName">Jumlah Barang</label>
                        <input type="text" name="JumlahBarang" class="form-control" id="exampleInputName" placeholder="Jumlah Barang" required>
                        <div class="invalid-feedback">
                                Please fill out this field
                        </div>                     
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="submit" class="btn btn-danger">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var forms = document.querySelectorAll('.needs-validation')
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
            }, false)
        })
    </script>
@stop
