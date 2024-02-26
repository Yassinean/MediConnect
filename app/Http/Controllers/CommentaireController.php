<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commentaire = Commentaire::all();
        return view('patient.doctor_profile', compact('commentaire'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateForm = $request->validate([
            'comment' => 'required',
            'medecinId' => 'required',

        ]);

        $comments = Commentaire::create([
            'medecin_id' => $validateForm['medecinId'],
            'patient_id' => Auth::id(),
            'commentaire' => $validateForm['comment'],
        ]);

        // dd($validateForm);
        return view('patient.doctor_profile', compact('comments'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Commentaire $commentaire, $id)  //
    {
        $patient = Patient::where('id_user', Auth::id())->first();
        $commentaire = Commentaire::where('medecin_id', $id)->where('patient_id')->get();
        // $star_rating = $commentaire->rating;
        // dd($commentaire);
        $commentaireCount = Commentaire::count();
        $medecin = Medecin::findOrFail($id);
        $commentaire = $medecin->get();
        dd($commentaire);
        return view('patient.doctor_profile', compact('medecin', 'commentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()  //Commentaire $commentaire
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)  //Commentaire $commentaire
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()  //Commentaire $commentaire
    {
        //
    }
}
