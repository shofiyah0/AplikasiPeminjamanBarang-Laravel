@extends('adminlte::page')

@section('title', 'Tambah Data Pengembalian')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Data Pengembalian</h1>
@stop

@section('content')
<form action="/insertpengembalian" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">  
                    <div class="form-group">
                        <label for="KodeBarang">Id Pinjam</label>
                        <input type="text" name="idPinjam" class="form-control" id="idPinjam" placeholder="id Pinjam" required>
                        <div class="invalid-feedback">
                                Please fill out this field
                        </div>  
                    </div>
                    
                    <div class="form-group">
                        <label for="TanggalKembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" name="TanggalKembali" class="form-control" id="TanggalKembali" placeholder="Tanggal Kembali" required>
                        <div class="invalid-feedback">
                                Please fill out this field
                        </div>  
                    
                    <div class="form-group">
                        <label for="WaktuPengembalian" class="form-label">Waktu Pengembalian</label>
                        <input type="time" name="WaktuPengembalian" class="form-control" id="WaktuPengembalian" placeholder="Waktu Pengembalian" required>
                        <div class="invalid-feedback">
                                Please fill out this field
                        </div>  
                    </div>
                
                    <div class="form-group">
                        <label for="StatusBarang">Status Barang</label>
                        <input type="text" name="StatusBarang" class="form-control" id="StatusBarang" placeholder="Status Barang" required>
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
