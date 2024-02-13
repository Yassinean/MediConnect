<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Medicament;
use App\Models\Patient;
use App\Models\Speciality;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    public function index()
    {
        $specialityCount = Speciality::count();
        $medecinCount = Medecin::count();
        $patientCount = Patient::count();
        return view('admin.dashboard', compact('specialityCount', 'medecinCount', 'patientCount'));
    }
    public function allMedicament()
    {
        $specialities = Medicament::all();
        return view('admin.medicament', compact('specialities'));
    }
    public function ajouterMedicament(Request $request)
    {
        $request->validate([
            'MedicamentName' => 'required',
        ]);
        Medicament::create([
            'MedicamentName' => $request->MedicamentName,
        ]);
        return redirect()->route('medicament.ajouterMedicament');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'MedicamentName' => 'required',
        ]);

        $speciality = Medicament::findOrFail($id);
        $speciality->update([
            'MedicamentName' => $request->MedicamentName,
        ]);

        return redirect()->route('medicament.allMedicament');
    }

    public function destroy($id)
    {
        $speciality = Medicament::findOrFail($id);
        $speciality->delete();

        return redirect()->route('medicament.allMedicament');
    }
}
