@extends('adminlte::page')

@section('title', 'Data Pengembalian')

@section('content_header')
    <h1 class="m-0 text-dark">Data Pengembalian Barang</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href= "/tambahpengembalian" class="btn btn-success">Tambah
                </a>
                 <a href="/exportpengembalian" class="btn btn-info">Export PDF</a> 
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif

                <hr>
                <div class="table-responsive">
                    <table class="table table-hover" id="db_pengembalian">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Id Pinjam</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Waktu Pengembalian</th>
                                <th>Status Barang</th>
                                <th>Opsi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach($data as $pengembalian)
                                <tr>
                                    <th scope="pengembalian">{{ $no++ }}</th>
                                    <td>{{$pengembalian->idKembali}}</td>
                                    <td>{{$pengembalian->TanggalKembali}}</td>
                                    <td>{{$pengembalian->WaktuPengembalian}}</td>
                                    <td>{{$pengembalian->StatusBarang}}</td>
                                    <td>
                                    <a href = "/tampilpengembalian/{{$pengembalian->idKembali}}" class="btn btn-primary btn-md">
                                        Edit
                                    </a>
                                    <a href = "/deletepengembalian/{{$pengembalian->idKembali}}" class="btn btn-danger btn-md">
                                        Delete
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   $(document).ready(function() {
       $('#db_pengembalian').DataTable({
           dom: 'lBfrtip',
           buttons: [
                'csv', 'excel' , 'print'
            ],
           processing: true,
           serverSide: true,
           lengthMenu: [[25, 100, -1], [25, 100, "All"]],
           ajax: '{{ route('list_data_pengembalian') }}',
           columns: [
           {data: 'DT_RowIndex', orderable: false, searchable: false},
           {data: 'idKembali'},
           {data: 'TanggalKembali'},
           {data: 'WaktuPengembalian'},
           {data: 'StatusBarang'},
           {data: 'action' , orderable: false, searchable: false}
       ]
       });
   });
</script>
@stop
