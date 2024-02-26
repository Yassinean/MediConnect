<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\RendezVous;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Can;

class RendezVousController extends Controller
{

    public function index()
    {
        return view('patient.rendez-vous');
    }

    public function doctorRondezVous()
    {
        $time = Carbon::now()->toDateString();
        // dd($time);
        $rendez_vous = RendezVous::where('medecin_id', Auth::id())->get();
        $rendez_vous->load('patient.user');
        return view('doctor.dashboard', compact('rendez_vous'));
    }
    public function indexPatient($idDoctor)
    {

        $existingDates = RendezVous::where('medecin_id', $idDoctor)->pluck('date')->toArray();

        return view('patient.rendez-vous', ["idDoctor" => $idDoctor, "existingDates" => $existingDates]);
    }

    public function rendezVousStore(Request $request)
    {
        if (Auth::check()) {
            $patient_id = Auth::user()->id;
            $patient = Patient::where("id_user", $patient_id)->first();

            $medecin_id = $request->input('iddoctor');
            $medecin = Medecin::where('id', $medecin_id)->first();

            // Debugging: Check if Patient and Medecin are found
            // dd($patient, $medecin);

            if ($medecin) {
                $validation = $request->validate([
                    'date' => 'required',
                ]);

                // Debugging: Check if validation passes

                if ($validation) {
                    $existingRendezVous = RendezVous::where('medecin_id', $medecin->id)
                        ->where('date', $request->date)
                        ->exists();

                    // Debugging: Check if existingRendezVous is found

                    if (!$existingRendezVous) {
                        $rendezVous = RendezVous::create([
                            'patient_id' => $patient->id,
                            'medecin_id' => $medecin->id,
                            'date' => $request->date,
                        ]);

                        // Debugging: Check if RendezVous is created successfully
                        // dd($rendezVous);

                        return redirect()->back()->with('success', 'Appointment booked successfully.');
                    } else {
                        return redirect()->back()->with('error', 'Selected time is already booked. Please choose another time.');
                    }
                } else {
                    return redirect()->back()->with('error', 'Validation failed.');
                }
            } else {
                return redirect()->back()->with('error', 'Medecin not found.');
            }
        } else {
            return redirect()->back()->with('error', 'Patient not logged in.');
        }
    }
}
