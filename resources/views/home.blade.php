@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')

<!-- Pesan Ketika Berhasil Masuk -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <p class="mb-0">You are logged in!</p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <!-- Membuat datatables -->
      {{-- datatables --}}
        <h5 class="card-title">Data Alat</h5>
        <div class="table-responsive">
          <table class="table table-hover" id="db_alat">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Jumlah Barang</th>
              </tr>
            </thead>
          </table>
        </div>
        
        {{-- <table class="table table-hover table-bordered table-stripped" id="example2">
        <thead>
          <tr>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Jumlah Barang</th>
          </tr>
          </thead>
        
          <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($data as $index => $row)
                <tr>
                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                    <td>{{$row->NamaBarang}}</td>
                    <td>{{$row->id}}</td>
                    <td>{{$row->JumlahBarang}}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
          {{ $data->links() }} --}}
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
   $(document).ready(function() {
       $('#db_alat').DataTable({
           dom: 'lBfrtip',
           processing: true,
           serverSide: true,
           lengthMenu: [[10, 100, -1], [10, 100, "All"]],
           ajax: '{{ route('list_data_alat') }}',
           columns: [
           {data: 'DT_RowIndex', orderable: false, searchable: false},
           {data: 'NamaBarang'},
           {data: 'id'},
           {data: 'JumlahBarang'},
            ]
       }
);
   });
</script>
@stop
