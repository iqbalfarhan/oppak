<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;
    public $email;
    public $password;

    public function login()
    {
        $valid = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $valid['active'] = true;

        if (Auth::attempt($valid)) {
            $this->flash('success', "Berhasil login");
            $this->redirect(route('home'), navigate:true);
        }
        else{
            $this->alert('error', "Kombinasi username dan password tidak ditemukan");
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}