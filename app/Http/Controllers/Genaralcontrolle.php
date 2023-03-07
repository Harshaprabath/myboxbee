<?php

namespace App\Http\Controllers;

use App\Models\shiping;
use App\Models\slider;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class Genaralcontrolle extends Controller
{
    public function genaral(){
        $ship = shiping::all();
        $logo = slider::where('type','=','logo')->get();
        return view('admin.action.generalseting',['ship'=>$ship,'logo'=>$logo]);
    }
    public function shiping(Request $req){
        try{
        $ship = shiping::all();
        if($ship->isEmpty()){
            $s= new shiping();
            $s->price = $req->price;
            $s->save();
        }
        else{
            $s= shiping::findorFail($req->id);
            $s->price = $req->price;
            $s->save();
        }
        $notify[] = ['success', ' Added successfully'];
        return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Could not be added .'];
            return back()->withNotify($notify);
        }
    }
}
