<?php

namespace App\Livewire\Pages\Ticket;

use App\Livewire\Forms\TicketForm;
use App\Models\Site;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public TicketForm $form;
    public $show;
    public $photo;

    #[On("createTicket")]
    public function createTicket()
    {
        $this->show = true;
        $this->form->kode = Str::random(8);
        $this->form->user_id = auth()->id();
    }

    #[On("editTicket")]
    public function editTicket(Ticket $ticket)
    {
        $this->form->setTicket($ticket);
        $this->show = true;
    }

    #[On("deleteTicket")]
    public function deleteTicket(Ticket $ticket)
    {
        $ticket->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Ticket berhasil dihapus');
    }

    public function simpan()
    {
        if ($this->photo) {
            $this->form->photo = $this->photo->hashName('ticket');
            $this->photo->store('ticket');
        }

        if (isset($this->form->ticket)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->dispatch('reload');
        $this->alert('success', 'Ticket berhasil disimpan');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->show = false;
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.pages.ticket.actions', [
            'sites' => Site::get()->groupBy('witel'),
            'perangkats' => [
                'PLN',
                'GENSET',
                'BATERAI',
                'RECTIFIER',
                'ATS / AMF',
                'LAINNYA'
            ]
        ]);
    }
}
