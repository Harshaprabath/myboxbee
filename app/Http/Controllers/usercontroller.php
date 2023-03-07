<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
   public function index(){
       try{
        $user = User::where('utype','=','USR')->get();
        return view('admin.action.user',['users' => $user,'url'=>'add']);
}
catch (\Illuminate\Database\QueryException $e) {
    $notify[] = ['error', 'Could not be Load .'];
    return back()->withNotify($notify);
}
   }

    public function active(Request $req)
    {
        try {
            if($req->status == '0'){

                $user = User::findOrFail($req->id);
                $user->status ='1';
                $user->save();
                $notify[] = ['success', 'User banned successfully'];
                return back()->withNotify($notify);
            }
            else
            {
                $user = User::findOrFail($req->id);
                $user->status ='0';
                $user->save();
                $notify[] = ['success', 'User activated successfully'];
                return back()->withNotify($notify);
            }

        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Could not be Active .'];
            return back()->withNotify($notify);
        }
    }
}
