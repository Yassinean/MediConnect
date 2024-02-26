<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dossier;
use App\Models\Medicament;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugs = Medicament::all();
        $time = Carbon::now()->toDateString();
        $rendez_vous = RendezVous::where('medecin_id', Auth::id())->get();
        $doctorId = Auth::id();
        $dossiers = Dossier::whereHas('rendezvous', function ($query) use ($doctorId) {
            $query->where('medecin_id', $doctorId);
        })->get();
        return view('doctor.dossier', compact('drugs', 'rendez_vous', 'dossiers'));
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
        // $dossier = Dossier::where();
        $dossier = Dossier::create([
            // '' => $request->input(''),
            'repos' => $request->input('repos'),
            'rendez_vous_id' => $request->input('rendez_vous_id'),
            'notes' => $request->input('notes'),
        ]);
        $dossier->medicaments()->attach($request->drugs);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Dossier $dossier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dossier $dossier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dossier $dossier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dossier $dossier)
    {
        //
    }
}
