<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\DocumentoController;

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::redirect('/', '/home');

Route::view('/usuarios/nuevo', 'auth.new-user');
Route::view('/util/icons', 'util.icons');
Route::post('/usuarios/nuevo', [UserController::class, 'createUser']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::view('/user/home', 'user-home');
    Route::view('/user/solicitudes/nueva-{asunto}', 'solicitudes.nueva')->where('asunto', '[A-Za-z]+');
    Route::get('/user/solicitudes/{id}/ver', [SolicitudController::class, 'verSolicitud']);
    Route::post('/user/solicitudes/{id}/documento', [DocumentoController::class, 'addDocumento']);
    Route::post('/solicitudes', [SolicitudController::class, 'addSolicitud']);

    Route::middleware([IsAdmin::class])->group(function () {
        Route::view('/home', 'admin-home');
        Route::get('/solicitudes/pendientes', [SolicitudController::class, 'viewPendientes']);
        Route::get('/solicitudes/consolidadas', [SolicitudController::class, 'viewConsolidadas']);
        Route::get('/solicitudes/aceptadas', [SolicitudController::class, 'viewAceptadas']);
        Route::get('/solicitudes/pagadas', [SolicitudController::class, 'viewPagadas']);
        Route::get('/solicitudes/completas', [SolicitudController::class, 'viewCompletas']);
        Route::post('/solicitudes/{id}/mail-recibo-pago', [SolicitudController::class, 'mailReciboDePago']);
        Route::post('/solicitudes/{id}/mail-certificado', [SolicitudController::class, 'mailCertificado']);
        Route::patch('/solicitudes/{id}', [SolicitudController::class, 'patchFromView']);
    });
});

Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::view('/login', 'auth.login')->name('login');
});