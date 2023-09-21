<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'nomor_nasabah',
        'dokumen',
        'kategori_id',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
