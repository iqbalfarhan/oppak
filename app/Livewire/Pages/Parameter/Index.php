<?php

namespace App\Livewire\Pages\Parameter;

use App\Models\Parameter;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.parameter.index', [
            'datas' => Parameter::get()
        ]);
    }
}
