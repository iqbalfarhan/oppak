<?php

namespace App\Livewire\Pages\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $cari;

    public function deleteUser(User $user): void{
        $user->delete();
    }

    public function render()
    {
        return view('livewire.pages.user.index', [
            'datas' => User::when($this->cari, function($user){
                $user->where('name','like',"%{$this->cari}%");
                $user->orWhere('username','like',"%{$this->cari}%");
            })->get()
        ]);
    }
}
