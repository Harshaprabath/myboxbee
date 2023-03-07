<?php

namespace App\Http\Livewire;

use App\Models\readytoship as Ready;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Readytoship extends Component
{
    public function render()
    {$user_id = Auth::id();
        $ready = Ready::all();
        return view('livewire.readytoship',['readys' => $ready,'user'=>$user_id])->layout('layout.base');
    }
}
