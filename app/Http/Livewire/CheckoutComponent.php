<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Email;
use App\Models\allorder;
use App\Models\order;
use App\Models\shiping;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use ShoppingCart;

use Jantinnerezo\LivewireAlert\LivewireAlert;

class CheckoutComponent extends Component
{

    use LivewireAlert;

    public $firstName;
    public $lastName;
    public $country;
    public $address;
    public $city;
    public $district;
    public $postalCode;
    public $phone;

    public $deliveryOption = 0;

    protected $rules = [
        'firstName' => 'required',
        'lastName' => 'required',
        'country' => 'required',
        'address' => 'required',
        'city' => 'required',
        'district' => 'required',
        'postalCode' => 'required',
        'phone' => 'required',
    ];

    public function mount() {
        if(ShoppingCart::count() < 1) {
            return redirect(route('gift-box-build'));
        }
    }

    public function render()
    {
        $ship = shiping::all();
        $user_id =  Auth::id();
        $cart_data = ShoppingCart::content();
        return view('livewire.checkout-component', ['cartItems'=>$cart_data,'ship'=>$ship,'user'=>$user_id]);
    }

    public function setDeliveryOption($option) {
        $this->deliveryOption = $option;
    }

    public function placeOrder($shipping, $total) {
        // dd($shipping);
        $this->validate();
        
        try {
            $user_id = Auth::id();
            $user = User::findOrFail($user_id);
            $user->firstname = $this->firstName;
            $user->lastname = $this->lastName;
            $user->phone = $this->phone;
            $user->country = $this->country;
            $user->city = $this->city;
            $user->address = $this->address;
            $user->postalcode = $this->postalCode;
            $user->province = $this->district;
            $user->save();
            if($user) {
                $order = new order();
                $order->user_id =$user_id;
                $order->subtotal = ShoppingCart::subtotal();
                $order->Total = $total;
                $order->shiping = $shipping;
                $order->method = $this->deliveryOption == 1 ?'Cash on delivery' :'Online payment';
                $order->action = 1;
                $order->save();

                $orderId =$order->id;

                if($order){
                    $cartItems = ShoppingCart::content();

                    $uniqId = uniqid();

                    foreach ($cartItems as $key => $item) {
                        $orderItem = new allorder();
                        $orderItem->order_id = $orderId;
                        $orderItem->item_id = $item->id;
                        $orderItem->user_id = $user_id;
                        $orderItem->item_price = $item->price;
                        $orderItem->item_name = $item->name;
                        $orderItem->quantity = $item->qty;
                        $orderItem->type = $this->deliveryOption == 1 ?'Cash on delivery' :'Online payment';;
                        $orderItem->item_image = $item->options->image;
                        $orderItem->status = $item->options->status;
                        $orderItem->status2 = $item->options->status2;
                        $orderItem->box_id = $uniqId;
                        $orderItem->box_type = $item->options->type ??'';
                        $orderItem->to = $item->options->to??'';
                        $orderItem->from = $item->options->from??'';
                        $orderItem->message = $item->options->message;
                        $orderItem->font = $item->options->font;
                        $orderItem->imageid = 0;
                        $orderItem->action = '1';
                        $orderItem->save();
                    }

                    ShoppingCart::destroy();
                    Session::put('builder_step', 0);
                    
                    // $mail = new Email();
                    // $mail->send($orderId);
                    $this->alert('success', 'Success', [
                        'position' => 'top-end',
                        'timer' => 3000,
                        'timerProgressBar' => true,
                        'text'=>'Place order successfully'
                    ]);
                    // return redirect(route('gift-box-build'));
                } else {
                    $this->alert('error', 'Error', [
                        'position' => 'top-end',
                        'timer' => 3000,
                        'timerProgressBar' => true,
                        'text'=>'Oops! Somthing Went Wrong. Try Again!'
                    ]);
                }
            } else {
                $this->alert('error', 'Error', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'timerProgressBar' => true,
                    'text'=>'Oops! Somthing Went Wrong. Try Again!'
                ]);
            }
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
