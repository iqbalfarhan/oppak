<?php

namespace App\Livewire\Partial;

use Livewire\Component;

class Nocontent extends Component
{
    public $title = "No content";

    public function render()
    {
        return view('livewire.partial.nocontent');
    }
}
