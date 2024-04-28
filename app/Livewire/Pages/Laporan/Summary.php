<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use Livewire\Component;

class Summary extends Component
{
    public Laporan $laporan;

    public function mount(Laporan $laporan)
    {
        $this->laporan = $laporan;
    }

    public function render()
    {
        return view('livewire.pages.laporan.summary');
    }
}
