<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ThanksController;
//hacer referencia al espacio de nombres donde se encuentra el controlador TemperaturaController
use App\Http\Controllers\TemperaturaController;
//hacer referencia al espacio de nombres donde se encuentra el controlador UsuarioController
use App\Http\Controllers\UsuarioController;

use App\Http\Controllers\genpdfController;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

<<<<<<< HEAD
Route::get('/generatepdf', [genpdfController::class, 'genepdf'])->name ('decargarpdf');
=======
Route::get('/thanks',[ThanksController::class,'create'])->name('thanks.index');

>>>>>>> bb1362e05089c111f32ae500f3284e0a04fde3c5

Route::get('/register',[RegisterController::class,'create'])->name('register.index')/* ->middleware('auth') */;
Route::post('/register',[RegisterController::class,'store'])->name('register.store');

Route::get('/login',[SessionsController::class,'create'])->name('login.index');
Route::post('/login',[SessionsController::class,'store'])->name('login.store');
Route::get('/logout',[SessionsController::class,'destroy'])->name('login.destroy');

Route::get('/search',[SearchController::class,'create'])->name('search.index')->middleware('auth');

//conuslta de las graficas 
Route::get('/grafica1',[TemperaturaController::class,'consultaDia'])->name('dia')->middleware('auth');
Route::get('/grafica2',[TemperaturaController::class,'consultaSemana'])->name('semana')->middleware('auth');
Route::get('/grafica3',[TemperaturaController::class,'consultaMes'])->name('mes')->middleware('auth');
Route::get('/grafica4',[TemperaturaController::class,'consultayear'])->name('year')->middleware('auth');

//circulos
Route::get('/circulo1',[TemperaturaController::class,'consultaCirculo1'])->name('circulo1')->middleware('auth');


//ruta de recursos que responda cuando se escriba en la url search
Route::resource('/search',TemperaturaController::class)->middleware('auth');

//ruta de recursos que responda cuando se escriba en la url /usuario
Route::resource('/usuario',UsuarioController::class)->middleware('auth');


//View Thanks




