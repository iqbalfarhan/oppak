<?php

use App\Http\Middleware\IsMeMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', \App\Livewire\Auth\Register::class)->name('register');
});

Route::middleware('auth')->group(function(){
    Route::middleware('can:print.laporan')->post('/print/laporan', [\App\Http\Controllers\PrintController::class, 'laporan'])->name('print.laporan');

    Route::middleware('can:home')->get('/home', \App\Livewire\Pages\Home\Index::class)->name('home');
    Route::middleware('can:profile')->get('/profile', \App\Livewire\Pages\Profile::class)->name('profile');
    Route::middleware('can:about')->get('/about', \App\Livewire\Pages\About::class)->name('about');
    Route::middleware('can:user.index')->get('/user', \App\Livewire\Pages\User\Index::class)->name('user.index');
    Route::middleware('can:permission.index')->get('/permission', \App\Livewire\Pages\Permission\Index::class)->name('permission.index');
    Route::middleware('can:setting.index')->get('/setting', \App\Livewire\Pages\Setting\Index::class)->name('setting.index');
    Route::middleware('can:site.index')->get('/site/index', \App\Livewire\Pages\Site\Index::class)->name('site.index');

    Route::middleware('can:tamu.index')->get('/tamu', \App\Livewire\Pages\Tamu\Index::class)->name('tamu.index');
    Route::middleware('can:tamu.create')->get('/tamu/create', \App\Livewire\Pages\Tamu\Create::class)->name('tamu.create');
    Route::middleware('can:tamu.dashboard')->get('/tamu/dashboard', \App\Livewire\Pages\Tamu\Dashboard::class)->name('tamu.dashboard');
    Route::middleware('can:tamu.show')->get('/tamu/{tamu}', \App\Livewire\Pages\Tamu\Show::class)->name('tamu.show');

    Route::middleware('can:ticket.index')->get('/ticket', \App\Livewire\Pages\Ticket\Index::class)->name('ticket.index');
    Route::middleware('can:ticket.log')->get('/ticket/{ticket}/log', \App\Livewire\Pages\Ticket\Log::class)->name('ticket.log');
    Route::middleware('can:ticket.show')->get('/ticket/{ticket}', \App\Livewire\Pages\Ticket\Show::class)->name('ticket.show');

    Route::middleware('can:laporan.index')->get('/laporan', \App\Livewire\Pages\Laporan\Index::class)->name('laporan.index');
    Route::middleware('can:laporan.mine')->get('/laporan/mine', \App\Livewire\Pages\Laporan\Mine::class)->name('laporan.mine');
    Route::middleware('can:laporan.download')->get('/laporan/download', \App\Livewire\Pages\Laporan\Download::class)->name('laporan.download');
    Route::middleware('can:laporan.show')->get('/laporan/{laporan}', \App\Livewire\Pages\Laporan\Show::class)->name('laporan.show');
    Route::middleware(['can:laporan.edit', IsMeMiddleware::class])->get('/laporan/{laporan}/edit', \App\Livewire\Pages\Laporan\Edit::class)->name('laporan.edit');

    Route::middleware('can:insidensial.index')->get('/insidensial', \App\Livewire\Pages\Insidensial\Index::class)->name('insidensial.index');

    Route::middleware('can:pergantian.index')->get('/pergantian', \App\Livewire\Pages\Pergantian\Index::class)->name('pergantian.index');
    Route::middleware('can:dokumentasi')->get('/dokumentasi', \App\Livewire\Pages\Dokumentasi::class)->name('dokumentasi');
});
