<?php

namespace App\Livewire\Pages\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class Show extends Component
{
    public Ticket $ticket;
    public Int $progress;

    protected $listeners = ['reload' => '$refresh'];

    public function updatedProgress()
    {
        $this->ticket->progress = $this->progress;
        $this->ticket->save();
    }

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
        $this->progress = $ticket->progress;
    }

    public function render()
    {
        return view('livewire.pages.ticket.show');
    }
}
