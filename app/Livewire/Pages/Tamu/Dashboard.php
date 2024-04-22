<?php

namespace App\Livewire\Pages\Tamu;

use App\Models\Tamu;
use Livewire\Component;

class Dashboard extends Component
{
    public $no = 1;
    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.tamu.dashboard', [
            'datas' => Tamu::get(),
        ]);
    }
}
