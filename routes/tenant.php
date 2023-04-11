<?php

declare(strict_types=1);


use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Tenancy\TaskController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::get('/', function () {
        return view('tenancy.welcome');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('tenancy.dashboard');
        })->name('dashboard');

        Route::resource('tasks', TaskController::class);
    });

    //Route to recovery the image url
    Route::get('/file/{path}', function ($path) {
        return response()->file(Storage::path($path));
    })->where('path', '.*')->name('file');

    require __DIR__ . '/auth.php';
});