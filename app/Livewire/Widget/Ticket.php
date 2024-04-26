<?php

namespace App\Livewire\Widget;

use Livewire\Component;

class Ticket extends Component
{
    protected $listeners = ['reload' => '$refresh'];

    public $number = 0;
    public $color = "base";
    public $title = "Visitor widget";
    public $desc = "Widget desctiption";

    public function render()
    {
        return view('livewire.widget.ticket');
    }
}
