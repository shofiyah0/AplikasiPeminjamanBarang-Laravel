@extends('adminlte::page')

@section('title', 'List Alat')

@section('content_header')
    <h1 class="m-0 text-dark">List Alat</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <a href= "/tambahalat" class="btn btn-success">Tambah </a>
                <a href="/exportalat" class="btn btn-info">Export PDF </a>
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
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Opsi </th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach($data as $alat)
                                <tr>
                                    <th scope="alat">{{ $no++ }}</th>
                                    <td>{{$alat->NamaBarang}}</td>
                                    <td>{{$alat->id}}</td>
                                    <td>{{$alat->JumlahBarang}}</td>
                                    <td>
                                    <a href = "/tampilalat/{{$alat->id}}" class="btn btn-primary btn-md">
                                        Edit
                                    </a>
                                    <a href = "/deletealat/{{$alat->id}}" class="btn btn-danger btn-md">
                                        Delete
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}

                    <div class="table-responsive">
                       <table class="table table-hover" id="db_alat">
                          <thead>
                             <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Kode Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Opsi </th>
                             </tr>
                          </thead>
                       </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


{{-- script jquery untuk panggil data di datatables --}}
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
   $(document).ready(function() {
       $('#db_alat').DataTable({
           dom: 'lBfrtip',
           buttons: [
                'csv', 'excel' , 'print'
            ],
           processing: true,
           serverSide: true,
           lengthMenu: [[10, 100, -1], [10, 100, "All"]],
           ajax: '{{ route('list_data_alat') }}',
           columns: [
           {data: 'DT_RowIndex', orderable: false, searchable: false},
           {data: 'NamaBarang'},
           {data: 'id'},
           {data: 'JumlahBarang'},
           {data: 'action' , orderable: false, searchable: false}
       ]
       });
   });
</script>

@stop