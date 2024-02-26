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

        $speciality = $request->input('speciality');
        $medecinQuery = Medecin::query();
        if ($speciality && $speciality !== 'Tout') {
            $medecinQuery = $medecinQuery->where('id_speciality', $speciality);
        }
        $medecin = $medecinQuery->get();

        return view('patient.dashboard', compact('specialities', 'medecin'));
    }
    public function indexHome(Request $request)
    {
        $specialities = Speciality::all();

        $speciality = $request->input('speciality');
        $medecinQuery = Medecin::query();
        if ($speciality && $speciality !== 'Tout') {
            $medecinQuery = $medecinQuery->where('id_speciality', $speciality);
        }
        $medecin = $medecinQuery->get();

        return view('welcome', compact('specialities', 'medecin'));
    }
}
