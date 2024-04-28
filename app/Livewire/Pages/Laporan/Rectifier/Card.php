<?php

namespace App\Livewire\Pages\Laporan\Rectifier;

use App\Models\Rectifier;
use Livewire\Component;

class Card extends Component
{
    public Rectifier $rectifier;

    public function mount(Rectifier $rectifier)
    {
        $this->rectifier = $rectifier;
    }

    public function render()
    {
        return view('livewire.pages.laporan.rectifier.card');
    }
}
