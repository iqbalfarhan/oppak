<?php

namespace App\Livewire\Pages\Laporan\Baterai;

use App\Livewire\Forms\BateraiForm;
use App\Models\Baterai;
use App\Models\Laporan;
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

    public ?BateraiForm $form;

    #[On("createBaterai")]
    public function createBaterai(Laporan $laporan)
    {
        $this->show = true;
        $this->form->laporan_id = $laporan->id;
    }

    #[On("editBaterai")]
    public function editBaterai(Baterai $baterai)
    {
        $this->show = true;
        $this->form->setBaterai($baterai);
    }

    #[On("deleteBaterai")]
    public function deleteBaterai(Baterai $baterai)
    {
        $baterai->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Baterai deleted');
    }

    public function simpan()
    {
        if ($this->photo) {
            $this->form->photo = $this->photo->hashName('baterai');
            $this->photo->store('baterai');
        }

        if (isset($this->form->baterai)) {
            $this->form->update();
        }
        else {
            $this->form->store();
        }

        $this->dispatch('reload');
        $this->alert('success', 'Baterai deleted');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->reset('photo');
        $this->show = false;
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.pages.laporan.baterai.actions');
    }
}
