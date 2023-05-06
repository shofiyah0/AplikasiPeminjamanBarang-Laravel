<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\Pinjam;

class Alat extends Model
{
    use HasFactory;
    use LogsActivity;
    
    protected $guarded = [];

    protected $fillable = ['id', 'NamaBarang', 'JumlahBarang'];
    protected static $logUnguarded = true;
    protected static $logFillable = true;

    public function pinjam(){
        return $this->hasMany(Pinjam::class, 'KodeBarang', 'id');
    }
}
