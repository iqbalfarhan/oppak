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
            'witels' => Site::pluck('witel')->unique(),
        ]);
    }
}
