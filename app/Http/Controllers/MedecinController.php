<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    public function index()
    {
        return view('doctor.dashboard');
    }

    public function allSpeciality()
    {
        $specialities = Speciality::all();
        return view('auth.register', compact('specialities'));
    }
}
