<?php

namespace App\Livewire\Pages\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Password extends Component
{
    public $show = false;
    public ?User $user;
    public $password;

    public function simpan(){
        $this->validate([
            'password' => 'required',
            'user' => 'required'
        ]);

        $this->user->update([
            'password' => $this->password
        ]);

        $this->reset();
    }

    #[On('resetUser')]
    public function onUser(User $user){
        $this->show = true;
        $this->user = $user;
    }

    public function resetForm(){
        $this->reset();
    }

    function generateRandomPassword() {
        $letters = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 4);
        $numbers = substr(str_shuffle('0123456789'), 0, 4);
        $password = $letters . $numbers;

        $this->password = $password;
    }

    public function render()
    {
        return view('livewire.pages.user.password');
    }
}
