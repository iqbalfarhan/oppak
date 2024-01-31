<?php

namespace App\Livewire\Partial;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{

    public function logout(){
        Auth::logout();

        $this->redirect('login', navigate:true);
    }

    public function render()
    {
        return view('livewire.partial.sidebar');
    }
}
