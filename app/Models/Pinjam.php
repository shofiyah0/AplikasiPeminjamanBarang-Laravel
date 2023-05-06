<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alat;
use App\Models\Pengembalian;

class Pinjam extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];
   
    protected $fillable = ['id','NamaPeminjam', 'NomorInduk','TanggalPeminjaman', 'WaktuPeminjaman', 'LokasiPinjam', 'KodeBarang', 'NamaBarang','JumlahBarang'];

    public function alat(){
        return $this->belongsTo(Alat::class);
    }

    public function pengembalian(){
        return $this->hasMany(Pengembalian::class, 'id', 'id');
    }
}
