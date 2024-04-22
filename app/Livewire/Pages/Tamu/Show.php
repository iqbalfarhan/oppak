<?php

namespace App\Livewire\Pages\Tamu;

use App\Models\Tamu;
use Livewire\Component;

class Show extends Component
{
    public Tamu $tamu;

    protected $listeners = ['reload' => '$refresh'];

    public function mount(Tamu $tamu)
    {
        $this->tamu = $tamu;
    }

    public function render()
    {
        return view('livewire.pages.tamu.show');
    }
}
