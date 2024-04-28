<?php

namespace App\Livewire\Pages\Laporan\Genset;

use App\Models\Genset;
use Livewire\Component;

class Card extends Component
{
    public Genset $genset;

    protected $listeners = ['reload' => '$refresh'];

    public function mount(Genset $genset)
    {
        $this->genset = $genset;
    }

    public function render()
    {
        return view('livewire.pages.laporan.genset.card');
    }
}
