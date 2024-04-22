<?php

namespace App\Livewire\Pages\Setting;

use App\Livewire\Forms\SettingForm;
use App\Models\Setting;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;

    public $show = false;
    public SettingForm $form;

    #[On('createSetting')]
    public function createSetting()
    {
        $this->form->reset();
        $this->show = true;
    }

    #[On('editSetting')]
    public function editSetting(Setting $setting)
    {
        $this->form->setSetting($setting);
        $this->show = true;
    }

    #[On('deleteSetting')]
    public function deleteSetting(Setting $setting)
    {
        $setting->delete();
        $this->alert('success', 'Setting berhasil dihapus');
        $this->dispatch('reload');
        $this->form->reset();
    }

    public function simpan()
    {
        if (isset($this->form->setting)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->alert('success', 'Setting berhasil diperbarui');
        $this->dispatch('reload');

        $this->reset();
    }

    public function closeModal(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.setting.actions');
    }
}
