<?php

namespace App\Http\Controllers;

use App\Models\readybox;
use App\Models\readytoship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ReadytoshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.action.addreadytoship',['url'=>'add']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        try{
        $ready = new readytoship();
        $ready->name = $req->name;
        $ready->price = $req->price;
        $ready->afterpay = $req->afterprice;
        $ready->descrription=$req->descrription;
        $ready->includes=$req->includes;
        $ready->details=$req->details;


     $img =array();
     if ($image = $req->file('image')) {

         foreach ($image as $files) {

         $image_name = md5(rand(1000,10000));
         $ext = strtolower($files->getClientOriginalExtension());
         $image_full_name = $image_name.'.'.$ext;
         $uploadpath = 'upload/';
         $files->move($uploadpath, $image_full_name);
         $img[] =  $image_full_name;

         }


     }
        $ready->images=implode('|',$img);
        $ready->save();
        $notify[] = ['success', 'Readytoshop  has been added successfully'];
        return back()->withNotify($notify);
    }

 catch (\Illuminate\Database\QueryException $e) {
    $notify[] = ['error', 'Readytoshop Could not be added .'];
    return back()->withNotify($notify);
}
    }

    public function view(){
        try{
       $ready= readytoship::all();
       return view('admin.action.readyoship',['ready' => $ready,'url'=>'add']);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Readytoship Could not be fetch .'];
            return back()->withNotify($notify);
        }
    }
    public function edit($id){
        try{
            $box = readytoship::find($id);
            return view('admin.action.addreadytoship',['ready' => $box,'url'=>'edit']);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', ' Could not be Fetch .'];
            return back()->withNotify($notify);
        }
    }
    public function viewbox(){
        try{
       $ready= readybox::all();
       return view('admin.action.readybox',['ready' => $ready,'url'=>'add']);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Readytoship Could not be fetch .'];
            return back()->withNotify($notify);
        }
    }
    public function boxedit($id){
        try{
            $box = readybox::find($id);
            return view('admin.action.readytoshipbox',['boxes' => $box,'url'=>'edit']);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Could not be Fetch .'];
            return back()->withNotify($notify);
        }
    }
    public function boxupdate(Request $req){
        try{
            $box = readybox::findOrFail($req->id);
            $box->name = $req->name;
            $box->title = $req->title;
            $box->price = $req->price;
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
            $notify[] = ['success', 'Readytoship Box has been Updated successfully'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Readytoship Box Could not be Updated .'];
            return back()->withNotify($notify);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\readytoship  $readytoship
     * @return \Illuminate\Http\Response
     */
    public function show(readytoship $readytoship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\readytoship  $readytoship
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\readytoship  $readytoship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        try{
        $ship = readytoship::findOrFail($req->id);
        $ship->name =$req->name;
        $ship->price =$req->price;
        $ship->afterpay =$req->afterprice;
        $ship->descrription =$req->descrription;
        $ship->includes =$req->includes;
        $ship->details =$req->details;
        $img =array();
        if($req->file('image') == '' || null){
          for ($i=0; $i < $req->length ; $i++) {
                $img[] = $req['getimg'.$i];

            }
          }

        else{

            if ($image = $req->file('image')) {

                foreach ($image as $files) {

                $image_name = md5(rand(1000,10000));
                $ext = strtolower($files->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $uploadpath = 'upload/';
                $files->move($uploadpath, $image_full_name);
                $img[] =  $image_full_name;

                }
                for ($i=0; $i < $req->length ; $i++) {

                    if(File::exists($req->getimg.$i)) {
                        File::delete($req->getimg.$i);
                    }

                }


            }
        }

        $ship->images=implode('|',$img);
        $ship->save();
        $notify[] = ['success', 'Readytoship  has been Updated successfully'];
        return back()->withNotify($notify);
    }

 catch (\Illuminate\Database\QueryException $e) {
    $notify[] = ['error', 'Readytoship Could not be Updated .'];
    return back()->withNotify($notify);

}


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\readytoship  $readytoship
     * @return \Illuminate\Http\Response
     */
    public function destroy(readytoship $readytoship)
    {
        //
    }

    public function boxlist(){
        return view('admin.action.readytoshipbox',['url'=>'add']);
    }
    public function createbox(Request $req){
        try{
        $box = new readybox();
        $box->name = $req->name;
        $box->title = $req->title;
        $box->price = $req->price;
        $imageName = time().'.'.$req->image->extension();
            $req->image->move(public_path('upload'), $imageName);
            $box->image = $imageName;
            $box->save();
            $notify[] = ['success', ' added successfully'];
            return back()->withNotify($notify);
        }



 catch (\Illuminate\Database\QueryException $e) {
    $notify[] = ['error', ' Could not be Updated .'];
    return back()->withNotify($notify);

}

    }
}
