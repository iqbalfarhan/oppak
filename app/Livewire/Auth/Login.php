<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;
    public $username = "";
    public $password = "";

    public function login(){
        $valid = $this->validate([
            'username' =>'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($valid)) {
            $this->flash('success', 'Berhasil login sebagai '.$this->username);
            $this->redirect('home', navigate:true);
        }
        else{
            $this->alert('error', 'User tidak ditemukan');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
