<?php

namespace App\Livewire\Pages\Laporan\Genset\Bateraistarter;

use App\Livewire\Forms\BateraistarterForm;
use App\Models\Bateraistarter;
use App\Models\Genset;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;

    public $show = false;
    public BateraistarterForm $form;

    #[On('createBateraistarter')]
    public function createBateraistarter(Genset $genset)
    {
        $this->show = true;
        $this->form->genset_id = $genset->id;
    }

    #[On('editBateraistarter')]
    public function editBateraistarter(Bateraistarter $bateraistarter)
    {
        $this->show = true;
        $this->form->setBateraistarter($bateraistarter);
    }

    #[On('deleteBateraistarter')]
    public function deleteBateraistarter(Bateraistarter $bateraistarter)
    {
        $bateraistarter->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Baterai starter berhasil dihapus');
    }

    public function simpan()
    {
        if (isset($this->form->bateraistarter)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->closeModal();
        $this->dispatch('reload');
        $this->alert('success', 'Baterai starter berhasil dihapus');
    }

    public function closeModal()
    {
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.laporan.genset.bateraistarter.actions');
    }
}
