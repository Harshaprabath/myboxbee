<?php

namespace App\Http\Livewire\Giftbox;

use App\Models\giftvoucher;
use App\Models\giftvoucherprice;
use Exception;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use ShoppingCart;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class VoucherSelectComponent extends Component
{
    use LivewireAlert;

    public $voucher;

    public $voPrice=null;

    public function render()
    {
        $vouchers = giftvoucher::all();
        $voucherprice = giftvoucherprice::all();
        return view('livewire.giftbox.voucher-select-component', ['vouchers'=>$vouchers, 'voucherPrice'=>$voucherprice]);
    }

    public function addVoucherToCart($id)
    {
        try{
            if(!$this->voPrice) {
                $this->alert('error', 'Error', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'timerProgressBar' => true,
                    'text'=>'Please Select Voucher Price.'
                ]);
                return;
            }

            $voucher = giftvoucher::find($id);
            $voucherprice = giftvoucherprice::find($this->voPrice);

            $data = [
                'image'=>$voucher->image,
                'from' => '',
                'to' => '',
                'message' => '',
                'status' => 'box',
                'status2' => 'voucher',
                'type' => '',
                'font' => '',
                'card' => '',
            ];

            $cartItems = ShoppingCart::content();
            foreach ($cartItems as $key => $value) {
                $getExist = $cartItems->contains(function($item, $key) use ($value) {
                    return $item->options->status2 == 'voucher' && $item->id == $value->id; 
                });
                if($getExist) {
                    ShoppingCart::remove($value->rowId);
                }
            }

            ShoppingCart::add($id, $voucher->name, 1 , $voucherprice->price, [...$data]);

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
