<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $specialities = Speciality::all();

        $doctorsQuery = Medecin::with('user', 'speciality')
            ->join('users', 'medecins.id_user', '=', 'users.id')
            ->join('specialities', 'medecins.id_speciality', '=', 'specialities.id');

        $speciality = $request->input('speciality');
        if ($speciality && $speciality !== 'Tout') {
            $doctorsQuery->where('specialities.id', $speciality);
        }

        $medecin = $doctorsQuery->get();
        return view('patient.dashboard', compact('specialities', 'medecin'));
    }
}
