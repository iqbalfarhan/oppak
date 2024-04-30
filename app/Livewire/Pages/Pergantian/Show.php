<?php

namespace App\Livewire\Pages\Pergantian;

use App\Models\Perangkat;
use App\Models\Pergantian;
use App\Models\Site;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    use LivewireAlert;

    protected $listeners = ['reload' => '$refresh'];
    public $show = false;
    public $no = 1;
    public ?Site $site;
    public ?Perangkat $perangkat;

    #[On('showPergantian')]
    public function showPergantian(Site $site, Perangkat $perangkat)
    {
        $this->show = true;
        $this->site = $site;
        $this->perangkat = $perangkat;
    }

    public function closeModal(){
        $this->show = false;
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.pergantian.show', [
            'datas' => isset($this->site) && isset($this->perangkat) ? Pergantian::where('site_id', $this->site->id)->where('perangkat_id', $this->perangkat->id)->latest('tanggal')->get() : collect([])
        ]);
    }
}
