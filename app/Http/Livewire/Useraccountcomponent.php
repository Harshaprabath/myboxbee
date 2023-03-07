<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Useraccountcomponent extends Component
{
    public function render()
    {
        $user = User::find(Auth::id());
        return view('livewire.useraccountcomponent',['user'=>$user])->layout('layout.base');
    }
}
