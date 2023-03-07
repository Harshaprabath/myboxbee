<?php

namespace App\Http\Controllers;

use App\Models\allorder;
use App\Models\order;
use App\Models\Product as ModelsProduct;
use App\Models\shiping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\coparete;
use App\Models\query;
use App\Models\capture;
use App\Models\screenshort;
class ordercontrolle extends Controller
{
    public function coparete(){
        $order = query::all();
        return view('admin.action.copareteorder',['order'=>$order]);
    }
    public function orders(){
        $order = order::join('users','orders.user_id', '=', 'users.id')->get(['orders.*','users.name'])->sortByDesc('id');
        return view('admin.action.order',['order'=>$order]);
    }
    public function view($id){
         $ord = order::where('orders.id','=',$id)->join('users','orders.user_id', '=', 'users.id')->get(['users.*','orders.*']);
        $order = allorder::where('order_id','=',$id)->get(['allorders.*']);
        $cardimage = capture::where('orderid','=',$id)->get('cardimage.imageid');
        $downloads=[];
        if(count($cardimage) <= 0)
        {
            $download = null;
        }
        else{
            foreach($cardimage as $item)
            {
            
            $download = screenshort::where('id','=',$item->imageid)->get(['screenshort.*'])->toArray();
            array_push($downloads,$download);
            }
        
        }
        
        return view('admin.action.vieworder',['order'=>$order,'ord'=>$ord,'download'=>$downloads]);
    }
    public function action(Request $req)
    {
        try{
            if($req->status == 'all'){
                $order = allorder::where('order_id','=',$req->id)->get(['allorders.*']);
                foreach($order as $item)
                {
                    if($item->status2 =="gift")
                    {
                    $product1 = Product::find($item->item_id);
                    if(!empty($product1))
                    {
                        $product =Product::FindOrFail($product1->id);
                    if($req->action == '3'){
                      
                        if( $product->quantity == '0'){
                            echo($product->quantity);
                            $notify[] = ['error', 'OutOfstock Gift Items!'];
                            return back()->withNotify($notify);
            
                            }
                            else{
                                $product->quantity = $product->quantity - $item->quantity;
                                $product->save();
                            }
                        
    
                    }
                    elseif($req->action == '0'){
                        if($product->oldquanity != $product->quantity){
                        $product->quantity = $product->quantity + $item->quantity;
                        $product->save();
                    }
                }
            
                }
                }
                $orde = allorder::where('id','=',$item->id)->update([
                    'action'=>$req->action
                ]);
                
             
            }
            $order = order::where('id','=',$req->id)->update([
                'action'=>$req->action
            ]);
                $notify[] = ['success', 'added Successfully'];
                     return back()->withNotify($notify);
            
            }

            elseif($req->status2 == 'gift'){
                $product = Product::findOrFail($req->item_id);
                
             

                    if($req->action == '3'){
                        if( $product->quantity == '0'){
                            $notify[] = ['error', 'OutOfstock This Items!'];
                            return back()->withNotify($notify);
            
                            }
                            else{
                                $product->quantity = $product->quantity - $req->quantity;
                                $product->save();
                            }
                        
    
                    }
                    elseif($req->action == '0'){
                        if($product->oldquanity != $product->quantity){
                        $product->quantity = $product->quantity + $req->quantity;
                        $product->save();
                    }
                }
            
                $orde = allorder::where('id','=',$req->id)->update([
                    'action'=>$req->action
                ]);
                if($orde){
                    $notify[] = ['success', 'added Successfully'];
                        return back()->withNotify($notify);
                }
            }
           

         



            } catch (\Illuminate\Database\QueryException $e) {
                $notify[] = ['error', 'Added fail!'];
                return back()->withNotify($notify);
                // echo $e;
            }

                }


        public function complete(){
            $order = allorder::where('action','=','3')->get(['allorders.*']);
            $ord = order::join('users','orders.user_id', '=', 'users.id')->get(['users.*','orders.*']);
            $ship = shiping::all();
            return view('admin.action.report.complete',['order'=>$order,'ord'=>$ord,'ship'=>$ship]);
        }
        public function viewreport($id,$action){
            $ord = order::where('orders.id','=',$id)->join('users','orders.user_id', '=', 'users.id')->get(['users.*','orders.*']);
            $order = allorder::where('order_id','=',$id)->where('action','=',$action)->get(['allorders.*']);
            return view('admin.action.report.vieworderreport',['order'=>$order,'ord'=>$ord]);
        }
        public function search(Request $req)
        {
            try{

                $serch= allorder::where('action','=',$req->action)
                ->WhereBetween('created_at', [$req->start, $req->end])->get(['allorders.*']);
                // $serch = DB::select("select * from allorders where action='3' and  created_at between '$req->start 00:00:00' and '$req->end 23:59:59' ");
                return view('admin.action.report.complete',['order'=>$serch,]);
                } catch (\Illuminate\Database\QueryException $e) {
                    $notify[] = ['error', 'search fail!'];
                   echo $e;
                }

                    }



                    public function cancel(){
                        $order = allorder::where('action','=','0')->get(['allorders.*']);
                        $ord = order::join('users','orders.user_id', '=', 'users.id')->get(['users.*','orders.*']);
                        $ship = shiping::all();
                        return view('admin.action.report.cancel',['order'=>$order,'ord'=>$ord,'ship'=>$ship]);
                    }

                    public function searchcancel(Request $req)
                    {
                        try{

                            $serch= allorder::where('action','=',$req->action)
                            ->WhereBetween('created_at', [$req->start, $req->end])->get(['allorders.*']);
                            // $serch = DB::select("select * from allorders where action='3' and  created_at between '$req->start 00:00:00' and '$req->end 23:59:59' ");
                            return view('admin.action.report.cancel',['order'=>$serch,]);
                            } catch (\Illuminate\Database\QueryException $e) {
                                $notify[] = ['error', 'search fail!'];
                               echo $e;
                            }

                                }
}
