<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Speciality;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        // $specialityCount = Speciality::count();
        // $medecinCount = Medecin::count();
        // $patientCount = Patient::count();
        return view('patient.dashboard');
    }
}
