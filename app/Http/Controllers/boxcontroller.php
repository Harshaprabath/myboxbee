<?php

namespace App\Http\Controllers;

use App\Models\box;
use FFI\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class boxcontroller extends Controller
{
    //
    public function addbox(Request $req){
        try {
            $box = new box();
            $box->name = $req->name;
            $box->price = $req->price;
            $box->title = $req->title;
            $box->description = $req->description;
            $imageName = time().'.'.$req->image->extension();
            $req->image->move(public_path('upload'), $imageName);
            $box->image = $imageName;
            $box->save();
            $notify[] = ['success', 'Box  has been added successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Box Could not be added .'];
            return back()->withNotify($notify);
        }


    }

    public function boxview(){
        try{
            $box = box::all();
            return view('admin.action.box',['boxes' => $box,'url'=>'add']);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Box Could not be Fetch .'];
            return back()->withNotify($notify);
        }
    }
    public function boxedit($id){
        try{
            $box = box::find($id);
            return view('admin.action.boxcreate',['boxes' => $box,'url'=>'edit']);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Box Could not be Fetch .'];
            return back()->withNotify($notify);
        }
    }
    public function boxupdate(Request $req){
        try{
            $box = box::findOrFail($req->id);
            $box->name = $req->name;
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
            $notify[] = ['success', 'Box  has been Updated successfully'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Box Could not be Updated .'];
            return back()->withNotify($notify);
        }
    }

    public function removeimage($fileloc){

        $filename = public_path('upload/'.$fileloc);

            if(File::exists($filename)) {
                File::delete($filename);
            }
    }

}
