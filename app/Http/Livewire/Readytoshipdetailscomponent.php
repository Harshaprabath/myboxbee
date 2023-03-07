<?php

namespace App\Http\Livewire;

use App\Models\card;
use App\Models\readybox;
use App\Models\readytoship;
use Livewire\Component;

class Readytoshipdetailscomponent extends Component
{
    public $pid;
    public function mount($id)
    {
        $this->pid = $id;
    }
    public function render()
    {
        $ready = readytoship::where('id',$this->pid)->first();
        $card = card::all();
        $box = readybox::all();
        return view('livewire.readytoshipdetailscomponent',['ready' => $ready,'cards'=>$card,'boxs'=>$box])->layout('layout.base');
    }
}
