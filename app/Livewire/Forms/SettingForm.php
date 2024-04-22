<?php

namespace App\Livewire\Forms;

use App\Models\Setting;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SettingForm extends Form
{
    public $key = "";
    public $value = "";
    public ?Setting $setting;

    public function setSetting(Setting $setting){
        $this->setting = $setting;

        $this->key = $setting->key;
        $this->value = $setting->value;
    }

    public function store(){
        $valid = $this->validate([
            'key' => 'required|unique:settings',
            'value' => 'required',
        ]);

        $valid['key'] = $this->generateKey($this->key);

        Setting::create($valid);
        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'key' => 'required|unique:settings,key,'.$this->setting->id,
            'value' => 'required',
        ]);

        $valid['key'] = $this->generateKey($this->key);

        $this->setting->update($valid);
        $this->reset();
    }

    public function generateKey(String $string){
        return Str::upper(Str::trim(Str::slug($string, "_")));
    }
}
