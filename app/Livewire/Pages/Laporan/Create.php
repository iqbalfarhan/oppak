<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use App\Models\Site;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public $show = false;
    public User $user;
    public Site $site;
    public $tanggal;

    #[On('createLaporan')]
    public function createLaporan()
    {
        $this->show = true;
    }

    public function simpan(){
        $laporan = Laporan::create([
            'site_id' => $this->site->id,
            'user_id' => $this->user->id,
            'tanggal' => $this->tanggal,
        ]);

        $this->redirect(route('laporan.show', $laporan->id), navigate: true);
    }

    public function mount(){
        $this->user = User::find(auth()->id());
        $this->site = Site::first();
        $this->tanggal = date('Y-m-d');
    }

    public function closeModal(){
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.pages.laporan.create');
    }
}
