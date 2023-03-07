<?php

namespace App\Http\Livewire;

use App\Models\slider;
use Livewire\Component;

class Aboutcomponent extends Component
{
    public function render()
    {
        $about = slider::where('type','=','about')->get();
        return view('livewire.aboutcomponent',['about'=>$about])->layout('layout.base');
    }
}
