<?php

namespace App\Livewire\Pages\Setting;

use App\Models\Setting;
use Livewire\Component;

class Index extends Component
{
    public $cari = "";
    public $no = 1;
    protected $listeners = [
        'reload' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.pages.setting.index', [
            'datas' => Setting::when($this->cari, function($setting){
                $setting->where('key', 'like', "%{$this->cari}%")
                ->orWhere('key', 'like', "%{$this->cari}%");
            })->get()
        ]);
    }
}
