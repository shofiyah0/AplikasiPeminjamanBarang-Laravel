<!DOCTYPE html>
<html>
<head>
<style>
#pengembalians {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#pengembalians td, #pengembalians th {
  border: 1px solid #ddd;
  padding: 8px;
}

#pengembalians tr:nth-child(even){background-color: #f2f2f2;}

#pengembalians tr:hover {background-color: #ddd;}

#pengembalians th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<table id="pengembalians">
  <tr>
    <th>No.</th>
    <th>Nama Barang</th>
    <th>Kode Barang</th>
    <th>Waktu Pengembalian</th>
    <th>Status Barang</th>
  </tr>
  @php
    $no=1;
  @endphp
  @foreach ($data as $row)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$row->NamaBarang}}</td>
        <td>{{$row->KodeBarang}}</td>
        <td>{{$row->JumlahBarang}}</td>
        <td>{{$row->WaktuPengembalian}}</td>
        <td>{{$row->StatusBarang}}</td>
    </tr>
  @endforeach
 
</table>

</body>
</html>


