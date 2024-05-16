<?php

namespace App\Livewire\Pages\Laporan\Amf;

use App\Livewire\Forms\AmfForm;
use App\Models\Laporan;
use App\Traits\ImageManipulateTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    use ImageManipulateTrait;

    public $photo;
    public $camera;
    public AmfForm $form;
    public Laporan $laporan;

    public function mount(Laporan $laporan)
    {
        $this->laporan = $laporan;
        $this->form->laporan_id = $laporan->id;

        if ($laporan->amf) {
            $this->form->setAmf($laporan->amf);
        }
    }

    public function updatedCamera($camera)
    {
        $this->photo = $camera;
        $this->camera = null;
    }

    public function simpan()
    {
        if ($this->photo) {
            $image = $this->manipulate($this->photo, $this->laporan->path);
            $this->form->photo = $image;
        }

        if (isset($this->form->amf)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->photo = null;
        $this->alert('success', 'Data Amf berhasil disimpan');
    }

    public function render()
    {
        return view('livewire.pages.laporan.amf.actions');
    }
}
