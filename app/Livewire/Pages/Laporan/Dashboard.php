<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use App\Models\Site;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.pages.laporan.dashboard', [
            'witels' => Site::$witels,
            'laporans' => Laporan::whereDate('created_at', now())->get()->groupBy('site.witel')->map(function ($group) {
                return $group->count();
            })->toArray()
        ]);
    }
}
