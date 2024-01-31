<?php

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

Route::get("/", function(){
    return redirect()->route('login');
})->name("welcome");

Route::middleware("guest")->group(function () {
    Route::get("/login", \App\Livewire\Auth\Login::class)->name("login");
});

Route::middleware("auth")->group(function () {
    Route::get("/home", \App\Livewire\Pages\Home::class)->name("home");
    Route::get("/dokumentasi", \App\Livewire\Pages\Dokumentasi::class)->name("dokumentasi");

    // user
    Route::get("/user", \App\Livewire\Pages\User\Index::class)->name("user.index");
    Route::get("/profile", \App\Livewire\Pages\User\Profile::class)->name("profile");

    // tamu
    Route::get("/tamu", \App\Livewire\Pages\Tamu\Index::class)->name("tamu.index");

    // role
    Route::get("/role", \App\Livewire\Pages\Role\Index::class)->name("role.index");

    // lokasi
    Route::get("/lokasi", \App\Livewire\Pages\Lokasi\Index::class)->name("lokasi.index");
});
