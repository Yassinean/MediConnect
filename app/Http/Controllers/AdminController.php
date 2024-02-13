<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Speciality;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $r)
    {
        $specialityCount = Speciality::count();
        $medecinCount = Medecin::count();
        $patientCount = Patient::count();
        return view('admin.dashboard', compact('specialityCount', 'medecinCount', 'patientCount'));
    }
}
