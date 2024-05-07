<?php

namespace App\Livewire\Pages\Laporan\Genset;

use App\Livewire\Forms\GensetForm;
use App\Models\Genset;
use App\Models\Laporan;
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

    public GensetForm $form;
    public ?Laporan $laporan;
    public $photo;
    public $genset;

    #[On('createGenset')]
    public function createGenset(Laporan $laporan)
    {
        $this->laporan = $laporan;
        $this->show = true;
        $this->form->laporan_id = $laporan->id;
    }

    #[On('editGenset')]
    public function editGenset(Genset $genset)
    {
        $this->show = true;
        $this->laporan = $genset->laporan;
        $this->form->setGenset($genset);
    }

    #[On('deleteGenset')]
    public function deleteGenset(Genset $genset)
    {
        $genset->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Genset deleted successfully');
    }

    public function simpan()
    {
        if ($this->photo) {
            $path = $this->manipulate($this->photo, $this->laporan->path);
            $this->form->photo = $path;
        }

        if (isset($this->form->genset)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->dispatch('reload');
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
        return view('livewire.pages.laporan.genset.actions');
    }
}
