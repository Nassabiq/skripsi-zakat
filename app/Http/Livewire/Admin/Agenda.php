<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

class Agenda extends Component
{
    use WithFileUploads;

    public $modal = false, $updateMode = false;
    public $nama_agenda, $foto_agenda;

    public $count = 0;

    public function render()
    {
        return view('livewire.admin.agenda')->layout('layouts.admin');
    }

    public function openModal()
    {
        $this->count++;
    }

    public function counter()
    {
        $this->count++;
    }
}
