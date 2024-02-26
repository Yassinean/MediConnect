<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_speciality',
    ];

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function rendezvous()
    {
        return $this->hasMany(Rendezvous::class);
    }
}
