<?php

namespace App\Livewire\Pages\Laporan\Rectifier;

use App\Livewire\Forms\RectifierForm;
use App\Models\Laporan;
use App\Models\Rectifier;
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

    public RectifierForm $form;

    #[On("createRectifier")]
    public function createRectifier(Laporan $laporan)
    {
        $this->form->laporan_id = $laporan->id;
        $this->show = true;
    }

    #[On("editRectifier")]
    public function editRectifier(Rectifier $rectifier)
    {
        $this->form->setRectifier($rectifier);
        $this->show = true;
    }

    #[On("deleteRectifier")]
    public function deleteRectifier(Rectifier $rectifier)
    {
        $rectifier->delete();

        $this->dispatch('reload');
        $this->alert('success', 'Rectifier deleted successfully');
    }

    public function simpan()
    {
        if ($this->photo) {
            $this->form->photo = $this->photo->hashName('rectifier');
            $this->photo->store('rectifier');
        }

        if (isset($this->form->rectifier)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->dispatch('reload');
        $this->alert('success', 'Rectifier berhasil disimpan');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->form->reset();
        $this->show = false;
        $this->photo = null;
    }

    public function render()
    {
        return view('livewire.pages.laporan.rectifier.actions');
    }
}
