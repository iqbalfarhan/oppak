<?php

namespace App\Livewire\Pages\Ticket;

use App\Models\Ticket;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    #[On("deleteTicket")]
    public function deleteTicket(Ticket $ticket)
    {
        $ticket->delete();
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.ticket.actions');
    }
}
