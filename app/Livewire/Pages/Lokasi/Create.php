<?php

namespace App\Livewire\Pages\Lokasi;

use App\Livewire\Forms\UserForm;
use App\Models\Lokasi;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $show = false;
    public UserForm $form;

    #[On('createUser')]
    public function onCreate(){
        $this->show = true;
    }

    #[On('editUser')]
    public function onEdit(User $user){
        $this->show = true;
        $this->form->setUser($user);
    }

    public function resetForm()
    {
        $this->reset('show');
        $this->form->reset();
    }

    public function simpan(){
        // dd($this->form->all());
        if (isset($this->form->user)) {
            $this->form->update();
        }else{
            $this->form->store();
        }

        $this->dispatch('reload');
        $this->reset('show');
    }

    public function render()
    {
        return view('livewire.pages.lokasi.create', [
            'roles' => Role::pluck('name'),
            'lokasis' => Lokasi::get()->groupBy('witel')
        ]);
    }
}
