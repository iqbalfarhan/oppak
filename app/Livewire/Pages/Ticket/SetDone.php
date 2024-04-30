<?php

namespace App\Livewire\Pages\Ticket;

use App\Models\Ticket;
use Livewire\Attributes\On;
use Livewire\Component;

class SetDone extends Component
{
    public $show = false;
    public ?Ticket $ticket;

    #[On('setDone')]
    public function setDone(Ticket $ticket){
        $this->show = true;
        $this->ticket = $ticket;
    }

    public function simpan(){
        $this->ticket->done = true;
        $this->ticket->pengajuan = false;
        $this->ticket->save();

        $this->ticket = null;
        $this->show = false;
        $this->dispatch('reload');
    }

    public function closeModal(){
        $this->show = false;
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.ticket.set-done');
    }
}
