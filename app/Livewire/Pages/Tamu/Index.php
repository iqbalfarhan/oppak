<?php

namespace App\Livewire\Pages\Tamu;

use App\Models\Tamu;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.tamu.index', [
            'datas' => Tamu::orderBy('keluar')->latest('created_at')->get()
        ]);
    }
}
