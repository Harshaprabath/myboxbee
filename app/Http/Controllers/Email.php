<?php

namespace App\Http\Controllers;

use App\Mail\sendmail;
use App\Models\allorder;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Email extends Controller
{
    //
    public function send($lastId)
    {
        $items = allorder::where('order_id', '=', $lastId)->get();

        $to = Auth::user()->email;
        \Mail::to($to)->cc('lumens.online@gmail.com')->send(new OrderShipped($items));

    }
    public function get(){
        $items = allorder::where('order_id', '=', 18)->get();
        return view('emails.orders.shipped',['data'=>$items]);
    }
}
