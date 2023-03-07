<?php

namespace App\Http\Livewire\Giftbox;

use Illuminate\Support\Facades\Session;
use Livewire\Component;
use ShoppingCart;

class GiftBoxPreviewComponent extends Component
{

    public $itemTotal = 0;

    protected $listeners = ['refreshComponent' =>'$refresh'];

    public function mount() {

    }

    public function render()
    {
        return view('livewire.giftbox.gift-box-preview-component');
    }

    public function removeItem($rowId) {
        ShoppingCart::remove($rowId);
        $this->emitUp('refreshComponent');
        $this->emitTo('cart.cart-icon-component', 'refreshComponent');
    }
}
