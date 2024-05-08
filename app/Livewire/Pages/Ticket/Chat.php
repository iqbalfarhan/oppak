<?php

namespace App\Livewire\Pages\Ticket;

use App\Models\Logticket;
use App\Models\Ticket;
use Livewire\Component;

class Chat extends Component
{
    public Ticket $ticket;
    protected $listeners = ['reload' => '$refresh'];

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function render()
    {
        return view('livewire.pages.ticket.chat', [
            'datas' => Logticket::where('ticket_id', $this->ticket->id)->get()->sortBy('id')
        ]);
    }
}
