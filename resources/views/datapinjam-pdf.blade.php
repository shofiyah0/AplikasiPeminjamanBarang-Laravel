<!DOCTYPE html>
<html>
<head>
<style>
#pinjams {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#pinjams td, #pengembalians th {
  border: 1px solid #ddd;
  padding: 8px;
}

#pinjams tr:nth-child(even){background-color: #f2f2f2;}

#pinjams tr:hover {background-color: #ddd;}

#pinjams th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<table id="pinjams">
  <tr>
    <th>No</th>
    <th>Nama Peminjam</th>
    <th>Nomor Induk</th>
    <th>Waktu Peminjaman</th>
    <th>Tanggal Peminjaman</th>
    <th>Lokasi Pinjam</th>
    <th>Nama Barang</th>
    <th>Jumlah Barang</th>
  </tr>
  @php
    $no=1;
  @endphp
  @foreach ($data as $row)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$row->NamaPeminjam}}</td>
        <td>{{$row->NomorInduk}}</td>
        <td>{{$row->WaktuPeminjaman}}</td>
        <td>{{$row->TanggalPinjam}}</td>
        <td>{{$row->LokasiPinjam}}</td>
        <td>{{$row->id}}</td>
        <td>{{$row->JumlahBarang}}</td>
    </tr>
  @endforeach
 
</table>

</body>
</html>


