<?php

namespace App\Http\Livewire\Giftbox;

use App\Models\sticker;
use Exception;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use ShoppingCart;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class StickerSelectComponent extends Component
{

    use LivewireAlert;

    public $sticker;

    public function render()
    {
        $stickers = sticker::all();

        return view('livewire.giftbox.sticker-select-component', ['stickers'=>$stickers]);
    }

    public function addStickerToCart($id) {
        try {
            $stricker = sticker::find($id);
            $data = [
                'image'=>$stricker->image,
                'from' => '',
                'to' => '',
                'message' => '',
                'status' => 'box',
                'status2' => 'sticker',
                'type' => '',
                'font' => '',
                'card' => '',
            ];

            $cartItems = ShoppingCart::content();
            foreach ($cartItems as $key => $value) {
                $getExist = $cartItems->contains(function($item, $key) use ($value) {
                    return $item->options->status2 == 'sticker' && $item->id == $value->id; 
                });
                if($getExist) {
                    ShoppingCart::remove($value->rowId);
                }
            }

            ShoppingCart::add($id, $stricker->name, 1 , $stricker->price, [...$data]);
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
}
