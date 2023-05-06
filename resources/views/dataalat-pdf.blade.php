<!DOCTYPE html>
<html>
<head>
<style>
#alats {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#alats td, #alats th {
  border: 1px solid #ddd;
  padding: 8px;
}

#alats tr:nth-child(even){background-color: #f2f2f2;}

#alats tr:hover {background-color: #ddd;}

#alats th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

</style>
</head>
<body>
<table id="alats">
  <tr>
    <th>No.</th>
    <th>Nama Barang</th>
    <th>Kode Barang</th>
    <th>Jumlah Barang</th>
  </tr>
  @php
    $no=1;
  @endphp
  @foreach ($data as $row)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$row->NamaBarang}}</td>
        <td>{{$row->id}}</td>
        <td>{{$row->JumlahBarang}}</td>
    </tr>
  @endforeach
 
</table>

</body>
</html>


