<?php

namespace App\Livewire\Pages\Laporan\Genset;

use App\Livewire\Forms\GensetForm;
use App\Models\Genset;
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

    public GensetForm $form;
    public $photo;
    public $genset;

    #[On('createGenset')]
    public function createGenset(Laporan $laporan)
    {
        $this->show = true;
        $this->form->laporan_id = $laporan->id;
    }

    #[On('editGenset')]
    public function editGenset(Genset $genset)
    {
        $this->show = true;
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
            $filename = $this->photo->hashName('baterai');
            $this->photo->store('baterai');

            $this->form->photo = $filename;
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
