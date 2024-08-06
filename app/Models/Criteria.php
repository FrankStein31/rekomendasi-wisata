<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Criteria extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'criterias';
    protected $primaryKey = 'id_criteria';
    protected $fillable = [
        'kode_atribut',
        'nama_atribut',
        'atribut',
        'keterangan',
    ];
}
