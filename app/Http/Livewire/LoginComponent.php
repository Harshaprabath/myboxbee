<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class LoginComponent extends Component
{
    public function render()
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('livewire.login-component');
    }
}
