<?php

namespace App\Livewire\Partial;

use Livewire\Component;

class Logo extends Component
{
    public $logotype = "text";
    public $class = 'h-16';

    public function render()
    {
        return view('livewire.partial.logo');
    }
}
