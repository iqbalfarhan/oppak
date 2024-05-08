<?php

namespace App\Livewire\Forms;

use App\Models\Ticket;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TicketForm extends Form
{
    public $site_id;
    public $user_id;
    public $kode;
    public $progress = 0;
    public $perangkat;
    public $uraian;
    public $done = false;
    public $pengajuan = false;
    public $photo;

    public ?Ticket $ticket;

    public function setTicket(Ticket $ticket){
        $this->ticket = $ticket;

        $this->site_id = $ticket->site_id;
        $this->user_id = $ticket->user_id;
        $this->kode = $ticket->kode;
        $this->progress = $ticket->progress;
        $this->perangkat = $ticket->perangkat;
        $this->uraian = $ticket->uraian;
        $this->done = $ticket->done;
        $this->pengajuan = $ticket->pengajuan;
    }

    public function store()
    {
        $valid = $this->validate([
            'site_id' => 'required',
            'user_id' => 'required',
            'kode' => 'required|unique:tickets,kode',
            'progress' => 'required',
            'perangkat' => 'required',
            'uraian' => 'required|max:255',
            'done' => 'required',
            'pengajuan' => 'required',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        Ticket::create($valid);

        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'site_id' => 'required',
            'user_id' => 'required',
            'kode' => 'required|unique:tickets,kode,'.$this->ticket->id,
            'progress' => 'required',
            'perangkat' => 'required',
            'uraian' => 'required|max:255',
            'done' => 'required',
            'pengajuan' => 'required',
        ]);

        if ($this->photo) {
            $valid['photo'] = $this->photo;
        }

        $this->ticket->update($valid);
        $this->reset();
    }
}
