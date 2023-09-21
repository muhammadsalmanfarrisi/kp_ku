<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'cabang_id',
    ];

    public function cabangs(){
        return $this->belongsTo(Cabang::class);
    }
}
