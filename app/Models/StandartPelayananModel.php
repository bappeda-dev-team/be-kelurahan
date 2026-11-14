<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StandartPelayananModel extends Model
{
    protected $table = 'standart_pelayanan';

    protected $fillable = [
        'persyaratan',
        'tata_cara',
        'waktu_penyelesaian',
        'biaya',
        'produk_layanan',
        'pengelolaan_pengaduan',
    ];
}