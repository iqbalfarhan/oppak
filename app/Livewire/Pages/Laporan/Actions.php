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
        $user = User::find(auth()->id());
        $this->user = $user;
        $this->site = $user->site_id ? Site::find($user->site_id) : null;
        $this->show = true;
    }

    public function simpan()
    {
        $this->validate([
            'site' => 'required'
        ]);

        $valid = [
            'site_id' => $this->site->id,
            'tanggal' => $this->tanggal,
        ];

        if (Laporan::where($valid)->count()) {
            $this->alert('error', 'Sudah membuat laporan');
        }
        else{
            $valid['user_id'] = $this->user->id;
            $laporan = Laporan::create($valid);
            $this->redirect(route('laporan.edit', $laporan->id), navigate: true);
        }
    }

    public function mount()
    {
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
