<?php

namespace App\Http\Livewire;

use App\Models\card;
use App\Models\cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartComponent extends Component
{
    public function render()
    {
        $user_id =  Auth::id();
          $cart_data = cart::where('user_id',$user_id)->get();
          $card = card::all();
        return view('livewire.cart-component',['data' => $cart_data,'card'=>$card])->layout('layout.base');

    }
}
