<?php

namespace App\Livewire\Pages\Site;

use App\Livewire\Forms\SiteForm;
use App\Models\Site;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public SiteForm $form;

    #[On('createSite')]
    public function createSite()
    {
        $this->show = true;
    }

    #[On('editSite')]
    public function editSite(Site $site)
    {
        $this->form->setSite($site);
        $this->show = true;
    }

    #[On('deleteSite')]
    public function deleteSite(Site $site)
    {
        $site->delete();
        $this->alert('success', 'Data site berhasil dihapus');
        $this->dispatch('reload');
    }

    public function simpan(){
        if (isset($this->form->site)) {
            $this->form->update();
        }
        else {
            $this->form->store();
        }

        $this->alert('success', 'Data site berhasil disimpan');
        $this->dispatch('reload');
    }

    public function closeModal(Site $site)
    {
        $this->form->reset();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.site.actions', [
            'witels' => Site::$witels,
            'listrik' => Site::$listrik,
        ]);
    }
}
