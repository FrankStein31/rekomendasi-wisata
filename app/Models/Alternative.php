<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $table = 'alternatives';

    protected $primaryKey = 'id_alternative';

    protected $fillable = [
        'nama_wisata',
        'alamat',
        'latitude',
        'longitude',
        'jenis_wisata',
        'img_wisata',
    ];
}
