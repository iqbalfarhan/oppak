<?php

namespace App\Livewire\Pages\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.user.index', [
            'user' => auth()->user(),
            'datas' => User::whereHas('roles', function ($role){
                $role->whereNot('name', 'superadmin');
            })->when($this->cari, function($user){
                $user->where('name', 'like', "%{$this->cari}%")
                ->orWhere('username', 'like', "%{$this->cari}%");
            })->orderBy('active', 'desc')->get()
        ]);
    }
}
