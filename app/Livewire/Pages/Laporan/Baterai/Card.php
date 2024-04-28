<?php

namespace App\Livewire\Pages\Laporan\Baterai;

use App\Models\Baterai;
use Livewire\Component;

class Card extends Component
{
    public Baterai $baterai;

    public function mount(Baterai $baterai)
    {
        $this->baterai = $baterai;
    }

    public function render()
    {
        return view('livewire.pages.laporan.baterai.card');
    }
}
