<?php

namespace App\Livewire\Pages\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;

    protected $listeners = [
        'reload' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.pages.ticket.index', [
            'datas' => Ticket::orderBy('done')->get()
        ]);
    }
}
