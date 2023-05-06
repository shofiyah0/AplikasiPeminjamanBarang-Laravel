@extends('adminlte::page')

@section('title', 'List Pinjam')

@section('content_header')
    <h1 class="m-0 text-dark">Data Peminjaman Barang</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <a href="/tambahpinjam" class="btn btn-success">Tambah </a>
                <a href="/exportpinjam" class="btn btn-info">Export PDF </a>
                <br>
                @if ($message = Session::get('success'))
                <br>    
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif

                <br>    
                    {{-- <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Peminjam</th>
                            <th>Nomor Induk</th>
                            <th>Waktu Peminjaman</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Lokasi Pinjam</th>
                            <th>Kode Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach($data as $pinjam)
                            <!-- yang $row aku ganti namanya jadi pinjam, biar ga bingung -->
                                <tr>
                                    <th scope="pinjam">{{ $no++ }}</th>
                                    <td>{{$pinjam->NamaPeminjam}}</td>
                                    <td>{{$pinjam->NomorInduk}}</td>
                                    <td>{{$pinjam->WaktuPeminjaman}}</td>
                                    <td>{{$pinjam->TanggalPinjam}}</td>
                                    <td>{{$pinjam->LokasiPinjam}}</td>
                                    <td>{{$pinjam->alat->NamaBarang}}</td>
                                    <td>{{$pinjam->JumlahBarang}}</td>
                                    <td>
                                    <a href = "/tampilpinjam/{{$pinjam->idPinjam}}" class="btn btn-primary btn-md">
                                        Edit
                                    </a>
                                    <a href = "/deletepinjam/{{$pinjam->idPinjam}}" class="btn btn-danger btn-md">
                                        Delete
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}

                    <div class="table-responsive">
                       <table class="table table-hover" id="db_pinjam">
                          <thead>
                             <tr>
                                <th>No.</th>
                                <th>Nama Peminjam</th>
                                <th>Nomor Induk</th>
                                <th>Waktu Peminjaman</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Lokasi Pinjam</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Aksi</th>
                             </tr>
                          </thead>
                          <tbody>
                          </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- script jquery untuk panggil data di datatables --}}
<script>
   $(document).ready(function() {
       $('#db_pinjam').DataTable({
           dom: 'lBfrtip',
           buttons: [
                'csv', 'excel' , 'print'
            ],
           processing: true,
           serverSide: true,
           lengthMenu: [[25, 100, -1], [25, 100, "All"]],
           ajax: '{{ route('list_data_pinjam') }}',
           columns: [
           {data: 'DT_RowIndex', orderable: false, searchable: false},
           {data: 'NamaPeminjam'},
           {data: 'NomorInduk'},
           {data: 'WaktuPeminjaman'},
           {data: 'TanggalPinjam'},
           {data: 'LokasiPinjam'},
           {data: 'KodeBarang'},
           {data: 'NamaBarang'},
           {data: 'JumlahBarang'},
           {data: 'action' , orderable: false, searchable: false}
       ]
       });
   });

   var addPinjam = document.getElementById('addPinjam')
    addPinjam.addEventListener('show.bs.modal', function (event) {
        $('.modal').modal('show')
    });

</script>
@stop