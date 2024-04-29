<?php

namespace App\Livewire\Pages\Perangkat;

use App\Livewire\Forms\PerangkatForm;
use App\Models\Perangkat;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;

    public $show = false;

    public ?PerangkatForm $form;

    #[On('createPerangkat')]
    public function createPerangkat()
    {
        $this->show = true;
    }

    #[On('editPerangkat')]
    public function editPerangkat(Perangkat $perangkat)
    {
        $this->form->setPerangkat($perangkat);
        $this->show = true;
    }

    #[On('deletePerangkat')]
    public function deletePerangkat(Perangkat $perangkat)
    {
        $perangkat->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data perangkat pergantian rutin berhasil dihapus');
    }

    public function closeModal()
    {
        $this->show = false;
        $this->form->reset();
    }

    public function simpan()
    {
        if (isset($this->form->perangkat)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->closeModal();
        $this->dispatch('reload');
        $this->alert('success', 'Data perangkat pergantian rutin berhasil disimpan');
    }

    public function render()
    {
        return view('livewire.pages.perangkat.actions');
    }
}
