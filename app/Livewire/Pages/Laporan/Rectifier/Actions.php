<?php

namespace App\Livewire\Pages\Laporan\Rectifier;

use App\Livewire\Forms\RectifierForm;
use App\Models\Laporan;
use App\Models\Rectifier;
use App\Traits\ImageManipulateTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use ImageManipulateTrait;

    public $show = false;
    public $photo;

    public RectifierForm $form;
    public Laporan $laporan;

    #[On("createRectifier")]
    public function createRectifier(Laporan $laporan)
    {
        $this->laporan = $laporan;
        $this->form->laporan_id = $laporan->id;
        $this->show = true;
    }

    #[On("editRectifier")]
    public function editRectifier(Rectifier $rectifier)
    {
        $this->laporan = $rectifier->laporan;
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
            $path = $this->manipulate($this->photo, $this->laporan->path);
            $this->form->photo = $path;
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
