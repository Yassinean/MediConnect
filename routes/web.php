<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ReviewRatingController;
use App\Http\Controllers\ProfileMedecinController;

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


/*---- MiddleWare for admin ----*/
Route::middleware(['auth', CheckRole::class . ':Admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/medicament', [MedicamentController::class, 'allMedicament'])->name('medicament.allMedicament');

    Route::post('/admin/speciality', [SpecialityController::class, 'ajouterSpeciality'])->name('speciality.ajouterSpeciality');

    Route::get('/admin/dashboard', [specialityController::class, 'index'])->name('admin.dashboard');
    /** Speciality controller */
    Route::get('/admin/speciality', [specialityController::class, 'allSpeciality'])->name('speciality.allSpeciality');
    Route::put('/admin/speciality/{id}', [SpecialityController::class, 'update'])->name('speciality.ModiSpeciality');
    Route::delete('/admin/speciality/{id}', [SpecialityController::class, 'destroy'])->name('speciality.deleteSpeciality');
    /** End Speciality controller */
    Route::post('/admin/medicament', [MedicamentController::class, 'ajouterMedicament'])->name('medicament.ajouterMedicament');
    Route::get('/admin/dashboard', [MedicamentController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/medicament', [MedicamentController::class, 'allMedicament'])->name('medicament.allMedicament');
    Route::put('/admin/medicament/{id}', [MedicamentController::class, 'update'])->name('medicament.ModiMedicament');
    Route::delete('/admin/medicament/{id}', [MedicamentController::class, 'destroy'])->name('medicament.deleteMedicament');
});

/*---- End MiddleWare for admin ----*/
/*---- MiddleWare for doctor ----*/
Route::middleware(['auth', CheckRole::class . ':Médecin'])->group(function () {
    Route::get('/doctor/rendezvous', [RendezVousController::class, 'doctorRondezVous'])->name('doctor.dashboard');
    Route::get('/doctor/medicament', [MedecinController::class, 'index'])->name('doctor.medicament');
    Route::get('/doctor/dossier', [DossierController::class, 'index'])->name('doctor.dossier');
    Route::post('/doctor/dossier', [DossierController::class, 'store'])->name('doctor.dossier.store');
    Route::post('/doctor/medicament', [MedicamentController::class, 'ajouterMedicamentMedecin'])->name('medicament.store');
    Route::delete('/doctor/medicament/{id}', [MedicamentController::class, 'destroy'])->name('medicament.delete');
});
Route::middleware(['auth', CheckRole::class . ':Patient'])->group(function () {
    Route::get('/patient/home', [PatientController::class, 'index'])->name('patient.dashboard');
    Route::get('/patient/home', [PatientController::class, 'index'])->name('index');
    Route::get('/patient/doctor_profile/{id}', [ProfileMedecinController::class, 'show'])->name('doctor.profile.show');
    Route::post('/patient/profile_medecin/review', [ReviewRatingController::class, 'reviewstore'])->name('doctor_profile.store');
    Route::get('/patient/doctor_profile', [ProfileMedecinController::class, 'index'])->name('doctor_profile.index');
    Route::get('/patient/doctor_profile/{medecin}', [ProfileMedecinController::class, 'show'])->name('doctor_profile.show');
    
    Route::get('/patient/rendez-vous/{id}', [RendezVousController::class, 'indexPatient'])->name('patient.reserve');
    Route::post('/patient/reserver', [RendezVousController::class, 'rendezVousStore'])->name('rendezVousStore');
    
    Route::get('/patient/rendez-vous', [RendezVousController::class, 'reIndex'])->name('reIndex');
    Route::get('/patient/rendez-vous/{idDoctor}', [RendezVousController::class, 'indexPatient'])->name('patient.rendez-vous');

});


/** Medicament controller */
/** End Medicament controller */

/** Patient controller */

/** End Patient controller */

/* Comment Controller  */

// routes/web.php

// Route::post('/patient/doctor_profile/{id}', [CommentaireController::class, 'store'])->name('doctor.comment.store');
// Route::resource('/patient/profile_medecin/comment', CommentaireController::class);
// Route::get('/patient/doctor_profile', [CommentaireController::class, 'index'])->name('commentaire');
/* End Comment Controller  */
// Route::post('/patient/doctor_profile/{id}', [CommentaireController::class, 'store'])->name('doctor_profile.store');


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
// Route::post('/patient/reserve', [RendezVousController::class, 'rendezVousStore'])->name('rendezVousStore');

require __DIR__ . '/auth.php';
