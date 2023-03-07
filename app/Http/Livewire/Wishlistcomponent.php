<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\wishlist;
use Livewire\Component;


class Wishlistcomponent extends Component
{
    public function render()
    {
        $user_id = session('user_id');

            $wishlist = wishlist::where('user_id' ,'=', $user_id )->first();
            $wish = $wishlist;
            $product = wishlist::where('user_id','=', $user_id)
            ->join('products','products.id', '=', 'wishlists.priduct_id')
            ->get();
            return view('livewire.wishlistcomponent',['products' => $product])->layout('layout.base');


    }
}
