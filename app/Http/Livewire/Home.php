<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $count = 0;
    public function render()
    {
        return view('livewire.home')->extends('layouts.app');
    }

    public function counter()
    {
        $this->count++;
    }
}
