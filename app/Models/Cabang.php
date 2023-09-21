<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'instansi_id',
    ];

    public function instansi(){
        return $this->belongsTo(Instansi::class);
    }

    public function units(){
        return $this->hasMany(Unit::class);
    }
}
