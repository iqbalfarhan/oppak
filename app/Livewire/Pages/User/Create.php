<?php

namespace App\Livewire\Pages\User;

use App\Livewire\Forms\UserForm;
use Livewire\Component;

class Create extends Component
{
    public $show = false;
    public UserForm $form;

    public function simpan(){
        $this->form->store();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.user.create');
    }
}
