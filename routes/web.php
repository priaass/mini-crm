<?php

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanieController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DivisionsController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\ContactController;
use App\Models\Contact;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.profil');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('panel/dashboard', [HomeController::class, 'index']);
    
    // Route::get('akun', [AkunCon  troller::class, 'create'])
    // ->name('akun');

    // Route::post('akun', [AkunController::class, 'store']);
    
    Route::resource('contact', ContactController::class);

    Route::resource('/akun', AkunController::class);
});

Route::get('/redirect-dashboard', function() {
    $user = Auth::user(); //ambil info pengguna
    if ($user->role == 'admin' || $user->role == 'superadmin') {
        return redirect('panel.dashboard');
    } else {
        return redirect('dashboard');
    }
})->name('dashboard.redirect');

Route::resource('/companie', CompanieController::class);
Route::resource('/employee', EmployeesController::class);
Route::resource('/division', DivisionsController::class);

require __DIR__.'/auth.php';
