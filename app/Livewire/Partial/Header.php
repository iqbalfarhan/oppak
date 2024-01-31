<?php

namespace App\Livewire\Partial;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Header extends Component
{
    public $title = "Selamat datang";
    public $desc = "";
    public $routes = [];

    public function mount($title = "",$desc = ""){
        if (!empty($title)) {
            $this->title = $title;
        }
        else{
            $this->title = "Selamat datang di ".config('app.name');
        }

        if (!empty($desc)) {
            $this->desc = $desc;
        }
        else{
            $this->desc = auth()->user()->name;
        }

        $this->routes = explode('.',Route::currentRouteName());
    }

    public function render()
    {
        return view('livewire.partial.header');
    }
}
