<?php

namespace App\Livewire\Pages\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class Log extends Component
{
    public Ticket $ticket;

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function render()
    {
        return view('livewire.pages.ticket.log');
    }
}
