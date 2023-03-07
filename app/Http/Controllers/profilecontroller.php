<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profilecontroller extends Controller
{
public function profile(){
   $user = User::find(Auth::id());
    return view('admin.action.profile',['user'=>$user]);
}
public function updatepassword(){
    return view('profile.update-password-form');
}
public function profileimage(Request $req){
        try {
            
            $prfile = User::findOrFail($req->id);
            if($req->image == '' || null){
                $imageName =$req->pimage;
            }else{
                $imageName = time().'.'.$req->image->extension();
                $req->image->move(public_path('upload/user'), $imageName);
            }
            
            $prfile->profile_photo_path = $imageName;
            $prfile->save();
            $notify[] = ['success', 'Profile added successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', ' Could not be added .'];
            return back()->withNotify($notify);
        }
}

public function update(Request $req){
    try {
        
        $prfile = User::findOrFail(Auth::id());
        $prfile->name = $req->name;
        $prfile->email = $req->email;
        $prfile->firstname = $req->firstname;
        $prfile->lastname = $req->lastname;
        $prfile->phone = $req->phone;

        $prfile->save();
        $notify[] = ['success', 'Profile Updated successfully'];
        return back()->withNotify($notify);
    } catch (\Illuminate\Database\QueryException $e) {
        $notify[] = ['error', ' Could not be Updated .'];
        return back()->withNotify($notify);
    }
}

}
