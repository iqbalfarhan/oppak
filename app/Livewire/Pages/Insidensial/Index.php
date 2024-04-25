<?php

namespace App\Livewire\Pages\Insidensial;

use App\Models\Insidensial;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.insidensial.index', [
            'datas' => Insidensial::latest()->get()
        ]);
    }
}
