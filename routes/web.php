<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () 
{
    $user = User::all();
    //echo 'hola' . $user->count(); exit();
    
    if ($user->count() > 0) {
        return view('auth.login');
    }else{
        return view('auth.loginUsuario');
    }
    
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//RUTAS A LAS PAGINAS

//(Roles y Permisos)
Route::resource('permissions_roles', 'App\Http\Controllers\PermissionsRolesController')->middleware('can:asignarRole_index'); //El controlador que administra a usuarios y sus roles
Route::resource('permissions_roles_auxiliar', 'App\Http\Controllers\auxiliarController')->middleware('can:asignarRole_index'); //El controlador que administra a usuarios y sus roles como auxiliar

//(Estructura Institucional)
Route::resource('regionales', 'App\Http\Controllers\RegionalController');
Route::put('regionales/{id}/actualizaRegional', 'App\Http\Controllers\RegionalController@actualizaRegional')->name('actualizarRegional'); //Actualizar Regional 
Route::resource('organigramas', 'App\Http\Controllers\OrganigramaController')->middleware('can:organigramas_index');
Route::resource('cargos', 'App\Http\Controllers\CargoController')->middleware('can:cargos_index');

//(Funcionarios)
Route::resource('funcionarios', 'App\Http\Controllers\FuncionarioController')->middleware('can:funcionario_index');
Route::patch('funcionarios/{id}/cambiarImagen', 'App\Http\Controllers\FuncionarioController@cambiarImagen')->name('cambiandoImagen'); //para cambiar unicamente la imagen del usuario

//(Hojas de Ruta)
Route::resource('buzon_entrada', 'App\Http\Controllers\BuzonEntradaController');
Route::resource('hojas_de_ruta', 'App\Http\Controllers\HojarutainternaController');
Route::put('update/{id}', 'App\Http\Controllers\HojarutainternaController@update')->name('updateHRI'); //actualizar
Route::put('show/{id}', 'App\Http\Controllers\HojarutainternaController@show')->name('archivarHRI');   //archivar
Route::put('derivar/{id}', 'App\Http\Controllers\HojarutainternaController@derivar')->name('derivarHRI');   //derivar

Route::resource('nueva_hoja_externa', 'App\Http\Controllers\HojarutaexternaController');
Route::resource('buzon_salida', 'App\Http\Controllers\BuzonSalidaController');
Route::resource('agrupar_hr', 'App\Http\Controllers\AgruparHRController');

Route::resource('hr_archivados', 'App\Http\Controllers\Hojas\HojarutaarchivadaController');

//Documentos: Generador de documentos para los administradores
Route::resource('documentos', 'App\Http\Controllers\Hojas\DocumentoController');