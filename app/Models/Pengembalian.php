<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    protected $fillable = ['id','TanggalKembali', 'WaktuPengembalian', 'JumlahBarang', 'StatusBarang'];

    public function pinjam(){
        return $this->belongsTo(pinjam::class);
    }
}
