<?php

namespace App\Http\Livewire\Giftbox;

use App\Models\box;
use Exception;
use Livewire\Component;
use ShoppingCart;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class BoxSelectComponent extends Component
{
    use LivewireAlert;

    public function render()
    {
        $boxes = box::all();
        return view('livewire.giftbox.box-select-component', ['boxes' => $boxes]);
    }

    public function addBoxToCart($boxId)
    {
        try {
            $item = box::find($boxId);

            // set addtional data
            $data = [
                'image' => $item->image,
                'from' => '',
                'to' => '',
                'message' => '',
                'status' => 'box',
                'status2' => 'box',
                'type' => 'medium',
                'font' => '',
                'card' => '',
            ];

            // check item already exist in the cart and remove if exist
            $cartItems = ShoppingCart::content();
            foreach ($cartItems as $key => $value) {
                $getExist = $cartItems->contains(function ($item, $key) use ($value) {
                    return $item->options->status2 == 'box' && $item->id == $value->id;
                });
                if ($getExist) {
                    ShoppingCart::remove($value->rowId);
                }
            }

            // add new item into cart
            ShoppingCart::add($boxId, $item->name, 1, $item->price, [...$data]);

            // refresh components
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
