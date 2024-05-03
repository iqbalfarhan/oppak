<?php

namespace App\Observers;

use App\Models\Laporan;

class LaporanObserver
{
    /**
     * Handle the Laporan "created" event.
     */
    public function created(Laporan $laporan): void
    {
        //
    }

    /**
     * Handle the Laporan "updated" event.
     */
    public function updated(Laporan $laporan): void
    {
        //
    }

    /**
     * Handle the Laporan "deleted" event.
     */
    public function deleted(Laporan $laporan): void
    {
        //
    }

    /**
     * Handle the Laporan "restored" event.
     */
    public function restored(Laporan $laporan): void
    {
        //
    }

    /**
     * Handle the Laporan "force deleted" event.
     */
    public function forceDeleted(Laporan $laporan): void
    {
        //
    }
}
