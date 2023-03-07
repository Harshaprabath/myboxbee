<?php

namespace App\Http\Livewire;

use App\Models\fetuers;
use App\Models\slider;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $default = asset('assets/image/slide1.jpg');
        $slider = slider::where('type','=','top')->get() ;
        $middle1 = slider::where('type','=','middle')->where('content' ,'=','1')->get();
        $middle2 = slider::where('type','=','middle')->where('content' ,'=','2')->get();
        $middle3 = slider::where('type','=','middle')->where('content' ,'=','3')->get();
        $partner = slider::where('type','=','partner')->get();
        $fetuers = fetuers::all();
        return view('livewire.home-component',['slider' =>$slider,'middle1'=>$middle1,'middle2'=>$middle2,'middle3'=>$middle3,'partner'=>$partner,'fetuers'=>$fetuers])->layout('layout.base');
    }
}
