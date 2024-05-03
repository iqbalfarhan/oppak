<?php

namespace App\Providers;

use App\Models\Insidensial;
use App\Models\Laporan;
use App\Models\Pergantian;
use App\Models\Tamu;
use App\Models\Ticket;
use App\Observers\InsidensialObserver;
use App\Observers\LaporanObserver;
use App\Observers\PergantianObserver;
use App\Observers\TamuObserver;
use App\Observers\TicketObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Tamu::observe(TamuObserver::class);
        Ticket::observe(TicketObserver::class);
        Insidensial::observe(InsidensialObserver::class);
        Laporan::observe(LaporanObserver::class);
        Pergantian::observe(PergantianObserver::class);
    }
}
