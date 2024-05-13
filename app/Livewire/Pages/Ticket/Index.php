<?php

namespace App\Livewire\Pages\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $search;
    public $done = null;
    public $pengajuan = null;

    protected $listeners = ['reload' => '$refresh'];

    public function setDone(?bool $done = null)
    {
        $this->pengajuan = null;
        $this->done = $done;
    }

    public function setPengajuan(?bool $pengajuan = null)
    {
        $this->pengajuan = $pengajuan;
        $this->done = false;
    }

    public function render()
    {
        return view('livewire.pages.ticket.index', [
            'datas' => Ticket::when($this->search, function($ticket){
                $ticket->where('kode', 'like', '%'.$this->search.'%')
                ->orWhere('perangkat', 'like', '%'.$this->search.'%')
                ->orWhere('uraian', 'like', '%'.$this->search.'%');
            })->when($this->done, function($ticket){
                $ticket->where('done', $this->done);
            })->when($this->pengajuan, function($ticket){
                $ticket->where('pengajuan', $this->pengajuan);
            })->withCount('logtickets')->latest()->orderBy('done')->get()
        ]);
    }
}
