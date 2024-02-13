<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function index()
    {
        $specialityCount = Speciality::count();
        $medecinCount = Medecin::count();
        $patientCount = Patient::count();
        return view('admin.dashboard', compact('specialityCount', 'medecinCount', 'patientCount'));
    }
    public function allSpeciality()
    {
        $specialities = Speciality::all();
        return view('admin.speciality', compact('specialities'));
    }
    public function ajouterSpeciality(Request $request)
    {
        $request->validate([
            'specialityName' => 'required',
        ]);
        Speciality::create([
            'specialityName' => $request->specialityName,
        ]);
        return redirect()->route('speciality.ajouterSpeciality');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'specialityName' => 'required',
        ]);

        $speciality = Speciality::findOrFail($id);
        $speciality->update([
            'specialityName' => $request->specialityName,
        ]);

        return redirect()->route('speciality.allSpeciality');
    }

    public function destroy($id)
    {
        $speciality = Speciality::findOrFail($id);
        $speciality->delete();

        return redirect()->route('speciality.allSpeciality');
    }
}
