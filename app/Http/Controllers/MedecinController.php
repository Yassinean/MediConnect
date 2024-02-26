<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\Speciality;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    public function index()
    {
        $drugs = Medicament::all();
        return view('doctor.medicament', compact('drugs'));
    }
    public function allSpeciality()
    {
        $allSpeciality = Speciality::all();
        return view('doctor.medicament', compact('allSpeciality'));
    }
}
