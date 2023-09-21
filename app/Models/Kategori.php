<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = [
        'keputusan',
        'instansi',
        'program',
        'nomor_surat',
        'cabang',
        'unit',
        'bulan',
        'tahun',
    ];

    public function dokumens(){
        return $this->hasMany(Dokumen::class);
    }
}
