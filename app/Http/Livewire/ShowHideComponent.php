<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowHideComponent extends Component
{
    public $showDiv = false;

    public function render()
    {
        return view('livewire.show-hide-component');
    }
}
