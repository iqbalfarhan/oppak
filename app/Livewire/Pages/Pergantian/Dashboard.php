<?php

namespace App\Livewire\Pages\Pergantian;

use App\Models\Pergantian;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.pages.pergantian.dashboard', [
            'datas' => Pergantian::orderBy('site_id')->get()->where(function($pergantian){
                return $pergantian->next_action->format('Y-m-d') == date('Y-m-d');
            })->groupBy('site_id')
        ]);
    }
}
