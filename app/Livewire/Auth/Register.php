<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Traits\LdapTrait;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Register extends Component
{
    use LivewireAlert;
    use LdapTrait;

    public $name;
    public $username;
    public $password;

    public function register()
    {
        $valid = $this->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ]);

        $user = User::create($valid);

        if ($user) {
            $user->assignRole('guest');

            Auth::login($user);
            $this->flash('success', "Berhasil login");
            $this->redirect(route('home'), navigate:true);
        }
        else{
            $this->alert('error', "Pendaftaran dibatalkan");
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
