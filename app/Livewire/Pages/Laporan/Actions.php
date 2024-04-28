<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use App\Models\Site;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;

    public $show = false;
    public User $user;
    public ?Site $site;
    public $tanggal;

    #[On('createLaporan')]
    public function createLaporan()
    {
        $this->show = true;
    }

    #[On('deleteLaporan')]
    public function deleteLaporan(Laporan $laporan)
    {
        $laporan->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Laporan deleted');
    }

    public function simpan()
    {
        $this->validate([
            'site' => 'required'
        ]);

        $laporan = Laporan::create([
            'site_id' => $this->site->id,
            'user_id' => $this->user->id,
            'tanggal' => $this->tanggal,
        ]);

        $this->redirect(route('laporan.show', $laporan->id), navigate: true);
    }

    public function mount()
    {
        $user = User::find(auth()->id());

        $this->user = $user;
        $this->site = $user->site_id ? Site::find($user->site_id) : null;
        $this->tanggal = date('Y-m-d');
    }

    public function closeModal(){
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.pages.laporan.actions');
    }
}