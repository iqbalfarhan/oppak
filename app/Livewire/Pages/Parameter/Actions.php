<?php

namespace App\Livewire\Pages\Parameter;

use App\Livewire\Forms\ParameterForm;
use App\Models\Parameter;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public $options;

    public ParameterForm $form;

    #[On('createParameter')]
    public function createParameter()
    {
        $this->show = true;
    }

    #[On('editParameter')]
    public function editParameter(Parameter $parameter)
    {
        $this->show = true;
        if ($parameter->type == "istrue") {
            $this->options = implode(', ', $parameter->options);
            $this->form->trueif = $parameter->trueif;
        }
        $this->form->setParameter($parameter);
    }

    #[On('deleteParameter')]
    public function deleteParameter(Parameter $parameter)
    {
        $parameter->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Berhasil memperbarui data parameter');
    }

    public function simpan()
    {
        if ($this->options) {
            $this->form->options = array_map('trim', explode(',', $this->options));
        }

        if (isset($this->form->parameter)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->closeModal();
        $this->dispatch('reload');
        $this->alert('success', 'Berhasil memperbarui data parameter');
    }

    public function closeModal()
    {
        $this->show = false;
        $this->options = null;
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.pages.parameter.actions');
    }
}
