<?php

namespace App\Observers;

use App\Models\Pergantian;

class PergantianObserver
{
    /**
     * Handle the Pergantian "created" event.
     */
    public function created(Pergantian $pergantian): void
    {
        //
    }

    /**
     * Handle the Pergantian "updated" event.
     */
    public function updated(Pergantian $pergantian): void
    {
        //
    }

    /**
     * Handle the Pergantian "deleted" event.
     */
    public function deleted(Pergantian $pergantian): void
    {
        //
    }

    /**
     * Handle the Pergantian "restored" event.
     */
    public function restored(Pergantian $pergantian): void
    {
        //
    }

    /**
     * Handle the Pergantian "force deleted" event.
     */
    public function forceDeleted(Pergantian $pergantian): void
    {
        //
    }
}
