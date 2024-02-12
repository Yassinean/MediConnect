<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function ajouterSpeciality(Request $request){
        $request->validate([
            'SpecialityName'=>'required',
        ]);
        Speciality::create([
            'SpecialityName' => $request->specialityName,
        ]);
        return redirect()->route('speciality.insertSpeciality');
    }
}
