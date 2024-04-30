<?php

namespace App\Livewire\Pages\Ticket;

use App\Livewire\Forms\TicketForm;
use App\Models\Site;
use App\Models\Ticket;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;

    public TicketForm $form;
    public $show;

    #[On("createTicket")]
    public function createTicket()
    {
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
    {}

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
