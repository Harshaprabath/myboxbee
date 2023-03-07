<?php

namespace App\Http\Controllers;

use App\Models\sticker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class stickercontroller extends Controller
{
    //
    public function addsicker(Request $req){
        try {
            $sticker = new sticker();
            $sticker->name = $req->stickername;
            $sticker->price = $req->price;
            $sticker->title = $req->title;
            $sticker->description = $req->description;
            $imageName = time().'.'.$req->image->extension();
            $req->image->move(public_path('upload'), $imageName);
            $sticker->image = $imageName;
            $sticker->save();
            $notify[] = ['success', 'Sticker  has been added successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Sticker Could not be added .'];
            return back()->withNotify($notify);
        }


    }
    public function stickerview(){
        try{
            $sticker = sticker::all();
            return view('admin.action.viewsticker',['sicker' => $sticker,'url'=>'add']);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Sticker Could not be Fetch .'];
            return back()->withNotify($notify);
        }
    }
    public function edit($id){
        try{
            $box = sticker::find($id);
            return view('admin.action.sticker',['boxes' => $box,'url'=>'edit']);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'sticker Could not be Fetch .'];
            return back()->withNotify($notify);
        }
    }
    public function stickerupdate(Request $req){
        try{
            $box = sticker::findOrFail($req->id);
            $box->name = $req->stickername;
            $box->title = $req->title;
            $box->price = $req->price;
            $box->description = $req->description;
            if($req->image == '' || null){
                $imageName =$req->getimg;
            }
            else{
                $imageName = time().'.'.$req->image->extension();
                $req->image->move(public_path('upload'), $imageName);
                $filename = public_path('upload/'.$req->getimg);

                if(File::exists($filename)) {
                    File::delete($filename);
                }
            }

            $box->image = $imageName;
            $box->save();
            $notify[] = ['success', 'Sticker  has been Updated successfully'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Sticker Could not be Updated .'];
            return back()->withNotify($notify);
        }
    }

}
