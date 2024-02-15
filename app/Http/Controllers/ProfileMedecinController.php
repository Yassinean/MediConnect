<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;

class ProfileMedecinController extends Controller
{
    public function index()
    {
        $medecinQ = Medecin::with('user', 'speciality')
            ->join('users', 'medecins.id_user', '=', 'users.id')
            ->join('specialities', 'medecins.id_speciality', '=', 'specialities.id');
        $medecin = $medecinQ->first();
        return view('patient.doctor_profile', compact('medecin'));
    }

    public function show($id)
    {
        $medecin = Medecin::with('user', 'speciality')->findOrFail($id);
        return view('patient.doctor_profile', compact('medecin'));
    }
}
