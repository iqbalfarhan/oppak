<?php

namespace App\Livewire\Pages\Pergantian;

use App\Livewire\Forms\PergantianForm;
use App\Models\Perangkat;
use App\Models\Pergantian;
use App\Models\Site;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $show = false;
    public $photo;
    public ?Site $site;
    public ?User $user;
    public ?Perangkat $perangkat;
    public ?PergantianForm $form;

    #[On('createPergantian')]
    public function createPergantian(Site $site, Perangkat $perangkat)
    {
        $this->form->reset();
        $this->show = true;
        $this->site = $site;
        $this->perangkat = $perangkat;
        $this->user = User::find(auth()->id());

        $this->form->user_id = $this->user->id;
        $this->form->site_id = $this->site->id;
        $this->form->perangkat_id = $this->perangkat->id;
    }

    #[On('editPergantian')]
    public function editPergantian(Pergantian $pergantian)
    {
        $this->user = User::find($pergantian->user_id);
        $this->site = Site::find($pergantian->site_id);
        $this->perangkat = Perangkat::find($pergantian->perangkat_id);

        $this->form->setPergantian($pergantian);
        $this->show = true;
    }

    #[On('deletePergantian')]
    public function deletePergantian(Pergantian $pergantian)
    {
        $pergantian->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Pergantian berhasil dihapus');
    }

    public function simpan()
    {
        if ($this->photo) {
            $this->form->photo = $this->photo->hashName('pergantian');
            $this->photo->store('pergantian');
        }

        if (isset($this->form->pergantian)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->closeModal();

        $this->dispatch('reload');
        $this->alert('success', 'Simpan log pergantian rutin');
    }

    public function closeModal(){
        $this->show = false;
        $this->photo = null;
        $this->form->reset();
    }

    public function mount(){
        $this->form->tanggal = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.pages.pergantian.actions');
    }
}
