<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use Throwable;
use App\Models\box;
use ErrorException;
use App\Models\card;
use App\Models\cart;
use App\Models\User;
use App\Models\query;
use App\Models\Product;
use App\Models\sticker;
use App\Models\readybox;
use App\Models\wishlist;
use App\Models\giftvoucher;
use App\Models\readytoship;
use App\Models\screenshort;
use Illuminate\Http\Request;
use App\Models\giftvoucherprice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function remove(Request $req)
    {

        $id = $req->id;
        $delete = cart::where('id', '=', $id)->delete();
        if ($delete) {
            return response()->json(['status' => '200']);
        }
    }
    public function addscreenshort(Request $request)
    {
        $folderPath = "upload/screen/";

        $base64Image = explode(";base64,", $request->image);
        $explodeImage = explode("image/", $base64Image[0]);
        $imageType = $explodeImage[1];
        $image_base64 = base64_decode($base64Image[1]);
        $file = $folderPath . uniqid() . '.' . $imageType;

        file_put_contents($file, $image_base64);
        $image = new screenshort();
        $image->image = $file;
        $image->user = Auth::id();
        $image->orderid = null;
        $image->save();
        $last_id = $image->id;
        return response(['status' => '1', 'id' => $last_id]);
    }

    public function addtocart(Request $request)
    {
        $products = Product::find($request->id);
        $prod_name = $products->name;
        $prod_image = $products->image;
        $priceval = $products->regular_price;
        $user_id = Auth::id();
        if ($user_id == '') {
            return redirect('/login');
        } else {
            if ($products) {
                $cart  = new cart();
                $cart->item_id = $request->id;
                $cart->user_id = $user_id;
                $cart->item_name = $products->name;
                $cart->item_quantity = $request->quantity;
                $cart->item_price = $products->regular_price;
                $cart->item_image = $products->pimage;
                $cart->box = '';
                $cart->from = '';
                $cart->to = '';
                $cart->message = '';
                $cart->status = 'item';
                $cart->status2 = 'item';
                $cart->type = '';
                $cart->card = '';
                $cart->font = '';
                $cart->save();

                return redirect('/cart');
            }
        }
    }
    public function box(Request $request)
    {
        try {
            $box = box::find($request->id);
            $cart = [
                'item_id' => $request->id,
                'item_name' => $box->name,
                'item_quantity' => '1',
                'item_price' => $box->price,
                'item_image' => $box->image,
                'box' => $request['properties']['box'],
                'from' => '',
                'to' => '',
                'message' => '',
                'status' => 'box',
                'status2' => 'box',
                'type' => $request->type,
                'font' => '',
                'card' => '',
            ];

            Session::put('cart_box_item', $cart);

            return response()->json([$cart]);

            // $user_id = Auth::id();
            // if($box){

            //         $cart  = new cart();
            //         $cart->item_id = $request->id;
            //         $cart->user_id = $user_id;
            //         $cart->item_name = $box ->name;
            //         $cart->item_quantity = '1';
            //         $cart->item_price = $box->price;
            //         $cart->item_image = $box ->image;
            //         $cart->box = $request['properties']['box'];
            //         $cart->from ='';
            //         $cart->to ='';
            //         $cart->message ='';
            //         $cart->status = 'box';
            //         $cart->status2 = 'box';
            //         $cart->type = $request->type;
            //         $cart->font = '';
            //         $cart->card ='';
            //         $cart->save();

            //  return response()->json(['status'=>'"'.$request->status.'" Added to Cart']);

            // }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => '""']);
        }
    }
    public function gift(Request $request)
    {
        try {
            $gift = Product::find($request->id);
            if ($gift->discount == '0') {
                $price = $gift->regular_price;
            } else {
                $price = $gift->discountprice;
            }
            $cart = [
                'item_id' => $request->id,
                'item_name' => $gift->name,
                'id' => uniqid(),
                'item_quantity' => '1',
                'item_price' => $price,
                'item_image' => $gift->pimage,
                'box' => $request['properties']['box'],
                'from' => '',
                'discount' =>  $gift->discount,
                'to' => '',
                'message' => '',
                'status' => 'box',
                'status2' => 'gift',
                'type' => '',
                'font' => '',
                'card' => '',
                

            ];

            return response()->json([$cart]);
            // $user_id = Auth::id();

            // $cart = session()->get('cart');
            //         if(!$cart){
            //             $cart = [
            //                 'gift'.$request->id => [
            //                     'item_id' => $request->id,
            //             'item_name' => $gift ->name,
            //             'item_quantity' => '1',
            //             'item_price' => $gift->regular_price,
            //             'item_image' => $gift ->pimage,
            //             'box'=> $request['properties']['box'],
            //             'from' =>'',
            //             'to' =>'',
            //             'message' =>'',
            //             'status' => 'box',
            //             'status2' => 'gift',
            //             'type' =>'',
            //             'font' => '',
            //             'card' => '',
            //                 ]
            //                 ];
            //                 session()->put('cart',$cart);
            //                 return response()->json(['status'=>'"'.$request->status.'" Added to Cart']);
            //         }



            //         $cart[] = [
            //             'item_id' => $request->id,
            //             'item_name' => $gift ->name,
            //             'item_quantity' => '1',
            //             'item_price' => $gift->regular_price,
            //             'item_image' => $gift ->pimage,
            //             'box'=> $request['properties']['box'],
            //             'from' =>'',
            //             'to' =>'',
            //             'message' =>'',
            //             'status' => 'box',
            //             'status2' => 'gift',
            //             'type' =>'',
            //             'font' => '',
            //             'card' => '',
            //         ];

            //         session()->put('cart',$cart);
            // if($gift){
            //     $cart  = new cart();
            //     $cart->item_id = $request->id;
            //     $cart->user_id = $user_id;
            //     $cart->item_name = $gift ->name;
            //     $cart->item_quantity = '1';
            //     $cart->item_price = $gift->regular_price;
            //     $cart->item_image = $gift ->pimage;
            //     $cart->box = $request['properties']['box'];
            //     $cart->from ='';
            //     $cart->to ='';
            //     $cart->message ='';
            //     $cart->status = 'box';
            //     $cart->status2 = 'gift';
            //     $cart->type = '';
            //     $cart->font = '';
            //     $cart->card ='';
            //     $cart->save();
            //  return response()->json(['status'=>'"'.$request->status.'" Added to Cart']);


        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => '"' . $e . '"']);
        }
    }
    public function card(Request $request)
    {
        try {
            $card = card::find($request->id);
            $cart = [
                'item_id' => $request->id,
                'item_name' => $card->name,
                'item_quantity' => '1',
                'item_price' =>  $card->price,
                'item_image' => $card->image,
                'box' => $request['properties']['box'],
                'from' => $request['properties']['from'] ?? '',
                'to' => $request['properties']['to'] ?? '',
                'message' => $request['properties']['message'] ?? '',
                'status' => 'box',
                'status2' => 'card',
                'type' => '',
                'font' => $request['properties']['font'] ?? '',
                'card' => '',

            ];

            return response()->json([$cart]);
            // $user_id = Auth::id();
            // if($card){
            //     $cart  = new cart();
            //     $cart->item_id = $request->id;
            //     $cart->user_id =  $user_id;
            //     $cart->item_name = $card ->name;
            //     $cart->item_quantity = '1';
            //     $cart->item_price = $card->price;
            //     $cart->item_image = $card ->image;
            //     $cart->box = $request['properties']['box'];
            //     $cart->from = $request['properties']['from'] ?? '' ;
            //     $cart->to =$request['properties']['to'] ?? '';
            //     $cart->message =$request['properties']['message'] ?? '' ;
            //     $cart->status = 'box';
            //     $cart->status2 = 'card';
            //     $cart->type = '';
            //     $cart->font = $request['properties']['font'] ?? '';
            //     $cart->card ='';
            //     $cart->save();
            //      return response()->json(['status'=>'"'.$request->status.'" Added to Cart']);
            // }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => '"' . $e . '"']);
        }
    }

    public function sticker(Request $request)
    {
        try {
            $stricker = sticker::find($request->id);
            $cart = [
                'item_id' => $request->id,
                'item_name' => $stricker->name,
                'item_quantity' => '1',
                'item_price' =>  $stricker->price,
                'item_image' => $stricker->image,
                'box' => $request['properties']['box'],
                'from' => '',
                'to' => '',
                'message' => '',
                'status' => 'box',
                'status2' => 'sticker',
                'type' => '',
                'font' =>  '',
                'card' => '',

            ];

            return response()->json([$cart]);
            // $user_id = Auth::id();
            // if($stricker){
            //     $cart  = new cart();
            //     $cart->item_id = $request->id;
            //     $cart->user_id =  $user_id;
            //     $cart->item_name = $stricker ->name;
            //     $cart->item_quantity = '1';
            //     $cart->item_price = $stricker->price;
            //     $cart->item_image = $stricker ->image;
            //     $cart->box = $request['properties']['box'];
            //     $cart->from = '';
            //     $cart->to ='';
            //     $cart->message ='';
            //     $cart->status = 'box';
            //     $cart->status2 = 'sticker';
            //     $cart->type = '';
            //     $cart->font = '';
            //     $cart->card ='';
            //     $cart->save();
            //      return response()->json(['status'=>'"'.$request->status.'" Added to Cart']);
            // }
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Cart added fail!'];
            return back()->withNotify($notify);
        }
    }
    public function voucher(Request $request)
    {
        try {
            $voucher = giftvoucher::find($request->id);
            $voucherprice = giftvoucherprice::find($request->id1);
            $cart = [
                'item_id' => $request->id,
                'item_name' => $voucher->name,
                'item_quantity' => '1',
                'item_price' =>  $voucherprice->price,
                'item_image' => $voucher->image,
                'box' => $request['properties']['box'],
                'from' => '',
                'to' => '',
                'message' => '',
                'status' => 'box',
                'status2' => 'voucher',
                'type' => '',
                'font' =>  '',
                'card' => '',

            ];

            return response()->json([$cart]);
            // $user_id = Auth::id();
            // if($voucher){
            //     $cart  = new cart();
            //     $cart->item_id = $request->id;
            //     $cart->user_id =  $user_id;
            //     $cart->item_name = $voucher ->name;
            //     $cart->item_quantity = '1';
            //     $cart->item_price = $voucherprice->price;
            //     $cart->item_image = $voucher ->image;
            //     $cart->box = $request['properties']['box'];
            //     $cart->from = '';
            //     $cart->to ='';
            //     $cart->message ='';
            //     $cart->status = 'box';
            //     $cart->status2 = 'voucher';
            //     $cart->type = '';
            //     $cart->font = '';
            //     $cart->card ='';
            //     $cart->save();
            //      return response()->json(['status'=>'"'.$request->status.'" Added to Cart']);

            // }
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Cart added fail!'];
            return back()->withNotify($notify);
        }
    }

    public function redytoship(Request $request)
    {
        try {

            $ship = readytoship::find($request->ship);
            $card = card::find($request->id);
            $box = readybox::find($request->box_id);

            $img = $ship->images;
            $explodeimg = explode('|', $img);

            $cart = [
                'item_id' => $request->ship,
                'item_name' => $ship->name,
                'item_quantity' => $request->quantity,
                'item_price' =>  $ship->price,
                'item_image' => $explodeimg[0],
                'box' => $request['properties']['box'],
                'from' => $request->from,
                'to' => $request->to,
                'message' => $request->message,
                'status' => 'ready to ship',
                'status2' => $request->status,
                'type' => '',
                'font' => $request->font,
                'card' => $card->name,
                'box_id' => $box->name

            ];
            return response()->json([$cart]);
            // if($carts->isEmpty()){
            //     echo 'empty';

            //         $cart  = new cart();
            //         $cart->item_id = $request->ship;
            //         $cart->user_id =  $user_id;
            //         $cart->item_name = $ship ->name;
            //         $cart->item_quantity = $request->quantity;
            //         $cart->item_price = $ship->price;
            //         $cart->item_image = $explodeimg[0];
            //         $cart->box = $box->name;
            //         $cart->from = $request->from;
            //         $cart->to =$request->to;
            //         $cart->message =$request->message;
            //         $cart->status = 'ready to ship';
            //         $cart->status2 = $request->status;
            //         $cart->type = '';
            //         $cart->font = $request->font ?? '';
            //         $cart->card =$card->name;
            //         $cart->save();
            //          return response()->json(['status'=>'"'.$request->status.'" Added to Cart']);
            // }

            // elseif($search->count()){
            //     $update = cart::where('item_id' ,'=' ,$request->ship)->where('status2','=' ,'RTS')->where('user_id',$user_id)
            //     ->update(['item_quantity' => $request->quantity,
            //     'item_name' => $ship ->name,
            //     'item_price'=>$ship->price,
            //     'item_image'=>$explodeimg[0],
            //     'box'=> $box->name,
            //     'from'=>$request->from,
            //     'font'=>$request->font ?? '',
            //     'to'=>$request->to,
            //     'message'=>$request->message ,
            //     'card'=>$card->name]);
            //     return response()->json(['status'=>'"'.$request->status.'" update to Cart']);

            //     }
            //     else{


            //         if($ship){
            //             $cart  = new cart();
            //             $cart->item_id = $request->ship;
            //             $cart->user_id =  $user_id;
            //             $cart->item_name = $ship ->name;
            //             $cart->item_quantity = $request->quantity;
            //             $cart->item_price = $ship->price;
            //             $cart->item_image = $explodeimg[0];
            //             $cart->box = $box->name;
            //             $cart->from = $request->from;
            //             $cart->to =$request->to;
            //             $cart->message =$request->message;
            //             $cart->status = 'ready to ship';
            //             $cart->status2 = $request->status;
            //             $cart->type = '';
            //             $cart->font = $request->font ??'';
            //             $cart->card =$card->name;
            //             $cart->save();
            //              return response()->json(['status'=>'"'.$request->status.'" Added to Cart2.']);

            //         }




        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Cart added fail!'];
            return back()->withNotify($notify);
        }
    }

    static function cartitem()
    {

        $user = User::find(Auth::id());
        $user_id = Auth::id();
        return cart::select('item_quantity')->where('user_id', $user_id)->count();
    }
    static function wishlist()
    {

        $user_id = Auth::id();
        return wishlist::select('id')->where('user_id', $user_id)->count();
    }

    public function updatetocart(Request $request)
    {
        try {
            $prod_id = $request->input('product_id');
            $quantity = $request->input('quantity');
            $status = $request->input('status2');
            $id = $request->input('id');
            $user_id = Auth::id();
            $cart = new cart();
            $get = cart::find($id);
            $itemprice = ($get->item_price * $quantity);
            $grandprice = number_format($itemprice);

            $update = cart::where('id', '=', $id)->where('status2', '=', $status)->where('user_id', '=', $user_id)->update(['item_quantity' => $quantity]);
            return response()->json([
                'price' => '' . $get->item_price . '', 'Quantity Updated',
                'gtprice' => '' . $grandprice . ''
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Cart Update fail!'];
            return back()->withNotify($notify);
        }
    }
    public function model()
    {
        $user_id = Auth::id();
        $cart_data = cart::where('user_id', $user_id)->get();

        return view('layout.cart2', ['data' => $cart_data]);
    }


    public function addwishlist(Request $req)
    {
        $id = $req->id;
        $user_id = Auth::id();
        if ($user_id == '') {
            return response()->json(['status' => '500']);
        } else {
            $update = Product::where('id', '=', $id)->update(['wishlist' => $user_id]);
            if ($update) {
                $wishlist = new wishlist();
                $wishlist->priduct_id = $id;
                $wishlist->user_id = $user_id;
                $wishlist->save();

                return response()->json(['status' => '200']);
            }
        }
    }
    public function query(Request $req)
    {
        try {
            $query = new query();
            $query->fname = $req->first_name;
            $query->lname = $req->last_name;
            $query->email = $req->email;
            $query->compny = $req->company;
            $query->Bquantity = $req->bquantity;
            $query->industry = $req->industry;
            $query->usecase = $req->usecase;
            $query->desiredSdate = $req->date;
            $query->LeadSource = $req->lead_source;
            $query->Igift = $req->Igift;
            $query->Egift = $req->egift;
            $query->Ishiping = $req->is;
            $query->haveyouworkeedwithus = $req->hyw;
            $query->about = $req->about;
            $query->save();
            return redirect('/');
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Cart Update fail!'];
            return back()->withNotify($notify);
        }
    }
}
