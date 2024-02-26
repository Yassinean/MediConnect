<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Commentaire;
use App\Models\ReviewRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileMedecinController extends Controller
{
    public function index()
    {

        $medecinQ = Medecin::with('user', 'speciality')->get();
        $medecin = $medecinQ->first();
        return view('patient.doctor_profile', compact('medecin'));
    }

    public function show($id)
    {

        // $patient = Patient::where('id_user', Auth::id())->first();

        $commentaireCount = ReviewRating::where('medecin_id', $id)->count();
        $medecin = Medecin::findOrFail($id);
        // $commentaire = $medecin->get();
        // return view('patient.doctor_profile', compact('medecin', 'commentaire'));
        $commants = ReviewRating::with('medecin', 'user')->where('medecin_id', $medecin->id)->get();
        return view('patient.doctor_profile', compact('medecin', 'commants', 'commentaireCount'));
    }
}
