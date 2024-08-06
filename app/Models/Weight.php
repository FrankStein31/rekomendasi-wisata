<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Weight extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'weights';
    protected $primaryKey = 'id_weight';
    protected $fillable = [
        'id_criteria',
        'nama_bobot',
        'bobot',
    ];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class, 'id_criteria', 'id_criteria');
    }

}
