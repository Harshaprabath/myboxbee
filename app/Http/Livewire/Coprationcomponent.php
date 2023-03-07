<?php

namespace App\Http\Livewire;

use App\Models\slider;
use Livewire\Component;

class Coprationcomponent extends Component
{
    public function render()
    {
        $coparate = slider::where('type','=','coparate')->get();
        return view('livewire.coprationcomponent',['coparate'=>$coparate])->layout('layout.base');
    }
}
