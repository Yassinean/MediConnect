<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\MedicamentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/patient/home', [PatientController::class, 'index'])->name('patient.dashboard');
Route::get('/doctor/home', [MedecinController::class, 'index'])->name('doctor.dashboard');
Route::get('/admin/medicament', [MedicamentController::class, 'allMedicament'])->name('medicament.allMedicament');

/** Speciality controller */
Route::post('/admin/speciality', [SpecialityController::class, 'ajouterSpeciality'])->name('speciality.ajouterSpeciality');
Route::get('/admin/dashboard', [specialityController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/speciality', [specialityController::class, 'allSpeciality'])->name('speciality.allSpeciality');
Route::put('/admin/speciality/{id}', [SpecialityController::class, 'update'])->name('speciality.ModiSpeciality');
Route::delete('/admin/speciality/{id}', [SpecialityController::class, 'destroy'])->name('speciality.deleteSpeciality');
/** End Speciality controller */
/** Medicament controller */
Route::post('/admin/medicament', [MedicamentController::class, 'ajouterMedicament'])->name('medicament.ajouterMedicament');
Route::get('/admin/dashboard', [MedicamentController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/medicament', [MedicamentController::class, 'allMedicament'])->name('medicament.allMedicament');
Route::put('/admin/medicament/{id}', [MedicamentController::class, 'update'])->name('medicament.ModiMedicament');
Route::delete('/admin/medicament/{id}', [MedicamentController::class, 'destroy'])->name('medicament.deleteMedicament');
/** End Medicament controller */

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
