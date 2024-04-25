<?php

namespace App\Livewire\Pages\Laporan\Genset;

use App\Livewire\Forms\GensetForm;
use App\Models\Genset;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;

    public GensetForm $form;
    public $genset;

    #[On('createGenset')]
    public function createGenset()
    {
        $this->show = true;
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
    }

    public function simpan()
    {
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
        $this->show = false;
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.pages.laporan.genset.actions');
    }
}
