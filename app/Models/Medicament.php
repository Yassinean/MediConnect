<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    protected $fillable = [
        'MedicamentName',
        'prix',
    ];

    public function dossiers()
    {
        return $this->belongsToMany(Dossier::class);
    }
}
