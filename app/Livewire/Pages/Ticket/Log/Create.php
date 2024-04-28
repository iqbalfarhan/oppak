<?php

namespace App\Livewire\Pages\Ticket\Log;

use App\Models\Logticket;
use App\Models\Ticket;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $photo;
    public $uraian;
    public Ticket $ticket;

    public function tambahLog()
    {
        $valid = $this->validate([
            'uraian' => 'required',
        ]);

        $valid['ticket_id'] = $this->ticket->id;
        $valid['user_id'] = auth()->id();

        if ($this->photo) {
            $this->validate([
                'photo' => 'image',
            ]);

            $photo = $this->photo->hashName('logticket');
            $this->photo->store('logticket');

            $valid['photo'] = $photo;
        }

        Logticket::create($valid);
        $this->dispatch('reload');

        $this->uraian = null;
        $this->photo = null;
    }

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function render()
    {
        return view('livewire.pages.ticket.log.create');
    }
}
