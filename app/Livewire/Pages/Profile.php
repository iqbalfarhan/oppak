<?php

namespace App\Livewire\Pages;

use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads, LivewireAlert;

    public $photo;
    public $name;
    public $username;
    public $notelp;
    public $telegram_id;
    public $password;
    public $site_id;
    public User $user;

    public function mount(){
        $user = User::find(auth()->id());

        $this->user = $user;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->telegram_id = $user->telegram_id;
        $this->notelp = $user->notelp;
        $this->site_id = $user->site_id;
    }

    public function simpan(){
        $valid = $this->validate([
            'user' => 'required',
            'name' => 'required',
            'notelp' => 'required',
            'username' => '',
            'telegram_id' => '',
            'site_id' => '',
        ]);

        if ($this->password) {
            $this->validate([
                'password' => 'required',
            ]);
            $valid['password'] = Hash::make($this->password);
        }

        if ($this->photo) {
            $this->validate([
                'photo' => 'image',
            ]);
            $this->photo->store('user');
            $valid['photo'] = $this->photo->hashName('user');
        }

        $this->user->update($valid);
        $this->alert('success', 'Data berhasil disimpan');
    }

    public function render()
    {
        return view('livewire.pages.profile', [
            'sites' => Site::get()->groupBy('witel'),
        ]);
    }
}
