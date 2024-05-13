<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use App\Traits\LdapTrait;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;
    use LdapTrait;

    public $username;
    public $password;
    public $ldap = false;
    public UserForm $form;

    public function login()
    {
        $valid = $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($this->ldap) {
            $check = $this->checkLdap($valid);

            if ($check == false) {
                $this->alert('error', 'User ldap tidak ditemukan');
            }
            else{
                $valid['name'] = $check;
                $valid['login'] = 'ldap';

                $user = User::updateOrCreate([
                    'username' => $valid['username']
                ], $valid);

                $user->assignRole('guest');

                Auth::login($user);
                $this->flash('success', "Berhasil login");
                $this->redirect(route('home'), navigate:true);
            }
        }
        else{
            $valid['active'] = true;

            if (Auth::attempt($valid)) {
                $this->flash('success', "Berhasil login");
                $this->redirect(route('home'), navigate:true);
            }
            else{
                $this->alert('error', "Kombinasi username dan password tidak ditemukan");
            }
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
