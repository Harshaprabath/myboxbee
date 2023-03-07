<?php

namespace App\Http\Livewire\Giftbox;

use App\Models\card;
use Exception;
use Livewire\Component;
use ShoppingCart;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CardSelectComponent extends Component
{

    use LivewireAlert;

    public $card;

    public $to;
    
    public $from;
    public $message;
    public $font;

    public $customizeCard = false;

    public function mount() {

    }
    
    public function render()
    {
        $cards = card::all();
        return view('livewire.giftbox.card-select-component', ['cards'=>$cards]);
    }

    public function addCardToCart($id, $cardOnly = true) {
        try {
        $card = card::find($id);
        if($cardOnly) {
            $data = [
                'image' => $card->image,
                'from' => '',
                'to' => '',
                'message' => '',
                'status' => 'box',
                'status2' => 'card',
                'type' => '',
                'font' => '',
                'card' => '',
            ];
        } else {
            $data = [
                'image' => $card->image,
                'from' => $this->from,
                'to' => $this->to,
                'message' => $this->message,
                'status' => 'box',
                'status2' => 'card',
                'type' => '',
                'font' => $this->font,
                'card' => '',
            ];
        }

        $cartItems = ShoppingCart::content();
        foreach ($cartItems as $key => $value) {
            $getExist = $cartItems->contains(function($item, $key) use ($value) {
                return $item->options->status2 == 'card' && $item->id == $value->id; 
            });
            if($getExist) {
                ShoppingCart::remove($value->rowId);
            }
        }

        ShoppingCart::add($id, $card->name, 1 , $card->price, [...$data]);
            $this->emitTo('giftbox.gift-box-preview-component', 'refreshComponent');
            $this->emitTo('cart.cart-icon-component', 'refreshComponent');
            $this->emitUp('refreshComponent');

            $this->alert('success', 'Success', [
                'position' => 'top-end',
                'timer' => 3000,
                'timerProgressBar' => true,
                'text'=>'Item Successfully added...'
            ]);

        } catch (Exception $ex) {
            $this->alert('error', 'Error', [
                'position' => 'top-end',
                'timer' => 3000,
                'timerProgressBar' => true,
                'text'=>'Oops! Somthing Went Wrong. Try Again!'
            ]);
        }

    }

    public function showCustomize($status = false) {
        $this->customizeCard = $status;
    }
}
