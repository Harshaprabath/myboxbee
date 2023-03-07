<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use App\Models\order;
use App\Models\capture;
use App\Models\shiping;
use App\Models\allorder;
use Illuminate\Http\Request;
use App\Http\Controllers\Email;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use ShoppingCart;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkout(){
        $ship = shiping::all();
        $user_id =  Auth::id();
        //   $cart_data = cart::where('user_id',$user_id)->get();
        $cart_data = ShoppingCart::content();
        // dd($cart_data);
        return view('checkout',['cartItems'=>$cart_data,'ship'=>$ship,'user'=>$user_id]);
    }
    public function order(Request $req){
        try{

            $user_id = Auth::id();
            $us = User::findOrFail($user_id);
            $us->firstname = $req->fname;
            $us->lastname = $req->lname;
            $us->phone = $req->phone;
            $us->country = $req->country;
            $us->city = $req->city;
            $us->address = $req->address;
            $us->postalcode = $req->pcode;
            $us->province = $req->province;
            $us->save();
            if($us){
                $order = new order();
                $order->user_id =$user_id;
                $order->subtotal = $req->sub;
                $order->Total = $req->total;
                $order->shiping = $req->ship;
                $order->method = $req->method;
                $order->action = 1;
                $order->save();
                $last_id =$order->id;
                if($order){
                    $cart = $req->cart;
                    $gift = $req->gift;
                   
                
                    for($i =0;$i< count($cart);$i++){
                    //    print_r($cart[$i]['item_name'] ?? $cart[$i][0]['item_name']);
                        $save = new allorder();
                        $save->order_id = $last_id;
                        $save->item_id = $cart[$i]['item_id'] ?? $cart[$i][0]['item_id'];
                        $save->user_id = $user_id;
                        $save->item_price = $cart[$i]['item_price'] ?? $cart[$i][0]['item_price'];
                        $save->item_name = $cart[$i]['item_name'] ?? $cart[$i][0]['item_name'];
                        $save->quantity = $cart[$i]['item_quantity'] ?? $cart[$i][0]['item_quantity'];
                        $save->type = $req->method;
                        $save->item_image = $cart[$i]['item_image'] ?? $cart[$i][0]['item_image'];
                        $save->status = $cart[$i]['status'] ?? $cart[$i][0]['status'];
                        $save->status2 = $cart[$i]['status2'] ?? $cart[$i][0]['status2'];
                        $save->box_id = $cart[$i]['box'] ?? $cart[$i][0]['box'];
                        $save->box_type = $cart[$i]['type'] ?? $cart[$i][0]['type'] ?? '';
                        $save->to = $cart[$i]['to'] ?? '';
                        $save->from = $cart[$i]['from'] ?? '';
                        $save->message = $cart[$i]['message'] ?? '';
                        $save->font = $cart[$i]['font'] ?? '';
                        $save->imageid = $cart[$i][0]['image'] ?? $cart[$i]['image'] ?? '0';
                        $save->action = '1';
                        $save->save();
                        if($save->status2 =="card" )
                        {
                           
                           
                            $capture = new capture();
                            $capture->imageid = $cart[$i][0]['image'] ?? $cart[$i]['image'] ?? '0';
                            $capture->orderid =$last_id;
                            $capture->save();
                        }
                    }
                    $mail = new Email();
                    $mail->send($last_id);
                    return response(['status'=>'1','id'=>$last_id]);


                }
            }
            else{
                return response(['status'=>'0']);
            }
        }
        catch (\Illuminate\Database\QueryException $e) {
            echo($e);
            return response(['status'=>'0']);

        }
    }
}
