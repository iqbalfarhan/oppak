<?php

namespace App\Livewire\Pages\Ticket;

use App\Models\Ticket;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Show extends Component
{
    use LivewireAlert;
    public Ticket $ticket;
    public Int $progress;

    protected $listeners = ['reload' => '$refresh'];

    public function updatedProgress()
    {
        $this->ticket->progress = $this->progress;
        $this->ticket->save();
    }

    public function togglePengajuan()
    {
        $this->ticket->pengajuan = !$this->ticket->pengajuan;
        $this->ticket->save();

        if ($this->ticket->pengajuan) {
            $message = "Pengajuan untuk close ticket berhasil dikirim";
        }
        else{
            $message = "Pengajuan close ticket berhasil dibatalkan";
        }
        $this->alert('success', $message);

        $username = auth()->user()->name;

        $this->ticket->logtickets()->create([
            'user_id' => auth()->id(),
            'uraian' => $this->ticket->pengajuan ? "$username melakukan request close ticket" : "$username membatalkan request close ticket"
        ]);

        $this->dispatch('reload');
    }

    public function toggleDone()
    {
        $done = $this->ticket->done;
        $this->ticket->done = !$done;

        if ($done == true) {
            $this->ticket->pengajuan = false;
        }

        $this->ticket->save();

        if ($done) {
            $message = "Ticket berhasil dibuka kembali";
        }
        else{
            $message = "Ticket berhasil diclose";
        }

        $this->alert('success', $message);

        $username = auth()->user()->name;
        $this->ticket->logtickets()->create([
            'user_id' => auth()->id(),
            'uraian' => $this->ticket->done ? "Ticket di close oleh $username" : "Ticket dibuka kembali oleh $username"
        ]);
        $this->dispatch('reload');
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
