<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;
    protected $fillable = [
        'repos',
        'rendez_vous_id',
        'notes',
    ];

    public function medicaments()
    {
        return $this->belongsToMany(Medicament::class);
    }

    public function rendezvous()
    {
        return $this->belongsTo(RendezVous::class, 'rendez_vous_id');
    }
}
