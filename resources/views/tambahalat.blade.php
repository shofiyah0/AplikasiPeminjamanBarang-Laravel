@extends('adminlte::page')

@section('title', 'Tambah Alat')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Alat</h1>
@stop

@section('content')
<form action="/insertalat" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Barang</label>
                        <input type="text" name="NamaBarang" class="form-control" id="exampleInputName" placeholder="Nama Barang" required>
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
