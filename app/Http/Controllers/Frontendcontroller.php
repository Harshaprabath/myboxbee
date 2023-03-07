<?php

namespace App\Http\Controllers;

use App\Models\fetuers;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class Frontendcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function partner(){
         $partner = slider::where('type','=','partner')->get();
        return view('admin.action.partner',['partner'=>$partner,'url'=>'add']);
     }
     public function editslider($id){
        $slider = slider::where('type','=','top')->get();
         $slide = slider::find($id);
        return view('admin.action.slider1',['slide' => $slide,'url'=>'edit','slider'=>$slider]);
     }
     public function editpartner($id){
        $slider = slider::where('type','=','partner')->get();
         $slide = slider::find($id);
        return view('admin.action.partner',['slide' => $slide,'url'=>'edit','partner'=>$slider]);
     }
     public function editfetuers($id){
        $fetuers = fetuers::all();
         $slide = fetuers::find($id);
        return view('admin.action.featuers',['slide' => $slide,'url'=>'edit','feuter'=>$fetuers]);
     }

     public function coparate(){
        try{
        $slider = slider::where('type','=','coparate')->get();
        return view('admin.action.coparte',['slider'=>$slider]);
    } catch (\Illuminate\Database\QueryException $e){
        $notify[] = ['error', ' Could not be added .'];

    }
     }

     public function about(){
        try{
        $slider = slider::where('type','=','about')->get();
        return view('admin.action.about',['slider'=>$slider]);
    } catch (\Illuminate\Database\QueryException $e){
        $notify[] = ['error', ' Could not be added .'];

    }
     }
    public function store(Request $request)
    {
    if($request->type == 'partner')
    {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('upload/frontend'), $imageName);
        $slider = new slider();
        $slider->image = $imageName;
        $slider->content ='';
        $slider->type=$request->type;
        $slider->save();
        $notify[] = ['success', ' added successfully'];
        return back()->withNotify($notify);
    }
     elseif($request->type == 'middle'){
         try {
             //code...

        if($request->content == '1'){
        $get = slider::where('type','=','middle')->where('content','=','1')->get();
        if($get ->isEmpty()){
            $slider = new slider();
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/frontend'), $imageName);
            $slider->image = $imageName;
            $slider->content = $request->content;
            $slider->type=$request->type;
            $slider->save();
            $notify[] = ['success', 'Image has been added successfully .'];
            return back()->withNotify($notify);
        }
        else{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/frontend'), $imageName);
            if(File::exists($request->image)) {
                File::delete($request->image);
            }
           $update = slider::where('type','=','middle')->where('content','=','1')->update(
                [
                   'image'=> $imageName,
                   'content'=> $request->content,
                   'type'=> $request->type,


                ]
                );
                if($update){
                    $notify[] = ['success', 'Image has been added successfully .'];
                    return back()->withNotify($notify);
                }
                else{
                    $notify[] = ['error', 'Image coluld not added.'];
                    return back()->withNotify($notify);
                }


        }
    }
    elseif($request->content == '2'){
        $get = slider::where('type','=','middle')->where('content','=','2')->get();
        if($get ->isEmpty()){
            $slider = new slider();
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/frontend'), $imageName);
            $slider->image = $imageName;
            $slider->content = $request->content;
            $slider->type=$request->type;
            $slider->save();
            $notify[] = ['success', 'Image has been added successfully .'];
            return back()->withNotify($notify);
        }
        else{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/frontend'), $imageName);
            if(File::exists($request->image)) {
                File::delete($request->image);
            }
           $update = slider::where('type','=','middle')->where('content','=','2')->update(
                [
                   'image'=> $imageName,
                   'content'=> $request->content,
                   'type'=> $request->type,


                ]
                );
                if($update){
                    $notify[] = ['success', 'Image has been added successfully .'];
                    return back()->withNotify($notify);
                }
                else{
                    $notify[] = ['error', 'Image coluld not added.'];
                    return back()->withNotify($notify);
                }


        }
    }
    elseif($request->content == '3'){
        $get = slider::where('type','=','middle')->where('content','=','3')->get();
        if($get ->isEmpty()){
            $slider = new slider();
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/frontend'), $imageName);
            $slider->image = $imageName;
            $slider->content = $request->content;
            $slider->type=$request->type;
            $slider->save();
            $notify[] = ['success', 'Image has been added successfully .'];
            return back()->withNotify($notify);
        }
        else{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/frontend'), $imageName);
            if(File::exists($request->image)) {
                File::delete($request->image);
            }
           $update = slider::where('type','=','middle')->where('content','=','3')->update(
                [
                   'image'=> $imageName,
                   'content'=> $request->content,
                   'type'=> $request->type,


                ]
                );
                if($update){
                    $notify[] = ['success', 'Image has been added successfully .'];
                    return back()->withNotify($notify);
                }
                else{
                    $notify[] = ['error', 'Image coluld not added.'];
                    return back()->withNotify($notify);
                }


        }
    }
} catch (\Illuminate\Database\QueryException $e){
    $notify[] = ['error', ' Could not be added .'];
    return back()->withNotify($notify);
}
     }
     else
     {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('upload/frontend'), $imageName);
        $slider = new slider();
        $slider->image = $imageName;
        $slider->content = $request->content;
        $slider->type=$request->type;
        $slider->save();
        return redirect('/admin/add-home')->with('status',"Insert successfully");
     }
    }
    public function fetuers(Request $req){
        $fetures = new fetuers();
        $fetures->title = $req->title;
        $fetures->discription = $req->description;
        $imageName = time().'.'.$req->image->extension();
        $req->image->move(public_path('upload/frontend'), $imageName);
        $fetures->image = $imageName;
        $fetures->save();
        return redirect('/admin/add-fetuers')->with('status',"Insert successfully");
    }

    public function middleimage(){
        return view('admin.action.middle');
    }
    public function slideupdate(Request $req)
    {
        try{
            $box = slider::findOrFail($req->id);
            if($req->image == '' || null){
                $imageName =$req->getimg;
            }
            else{
                $imageName = time().'.'.$req->image->extension();
                $req->image->move(public_path('upload/frontend'), $imageName);
                $filename = public_path('upload/frontend/'.$req->getimg);

                if(File::exists($filename)) {
                    File::delete($filename);
                }
            }

            $box->image = $imageName;
            $box->content = $req->content;
            $box->save();
            $notify[] = ['success', 'slider  has been Updated successfully'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'slider Could not be Updated .'];
            return back()->withNotify($notify);
        }
    }

    public function partnerupdate(Request $req)
    {
        try{
            $box = slider::findOrFail($req->id);
            if($req->image == '' || null){
                $imageName =$req->getimg;
            }
            else{
                $imageName = time().'.'.$req->image->extension();
                $req->image->move(public_path('upload/frontend'), $imageName);
                $filename = public_path('upload/frontend/'.$req->getimg);

                if(File::exists($filename)) {
                    File::delete($filename);
                }
            }

            $box->image = $imageName;
            $box->save();
            $notify[] = ['success', 'Partner  has been Updated successfully'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Partner Could not be Updated .'];

            return back()->withNotify($notify);
        }
    }

    public function fetuersupdate(Request $req)
    {
        try{
            $box = fetuers::findOrFail($req->id);
            if($req->image == '' || null){
                $imageName =$req->getimg;
            }
            else{
                $imageName = time().'.'.$req->image->extension();
                $req->image->move(public_path('upload/frontend'), $imageName);
                $filename = public_path('upload/frontend/'.$req->getimg);

                if(File::exists($filename)) {
                    File::delete($filename);
                }
            }

            $box->image = $imageName;
            $box->title = $req->title;
            $box->discription =$req->description;

            $box->save();
            $notify[] = ['success', 'Fetuers has been Updated successfully'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Fetuers Could not be Updated .'];

            return back()->withNotify($notify);
        }
    }

    public function addimage(Request $req){
        try{
            $coparate =new slider();
            $imageName = time().'.'.$req->image->extension();
            $req->image->move(public_path('upload/frontend'), $imageName);

            $coparate->image =  $imageName;
            $coparate->content = '';
            $coparate->type= $req->type;
            $coparate->save();
            $notify[] = ['success', 'Added successfully'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', ' Could not be Added .'];

            return back()->withNotify($notify);
        }
    }
    public function updatecoparate(Request $req)
    {
        try{
            $box = slider::findOrFail($req->id);
            if($req->image == '' || null){
                $imageName =$req->getimg;
            }
            else{
                $imageName = time().'.'.$req->image->extension();
                $req->image->move(public_path('upload/frontend'), $imageName);
                $filename = public_path('upload/frontend/'.$req->getimg);

                if(File::exists($filename)) {
                    File::delete($filename);
                }
            }

            $box->image = $imageName;
            $box->content = '';
            $box->type= $req->type;

            $box->save();
            $notify[] = ['success', ' Updated successfully'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Could not be Updated .'];

            return back()->withNotify($notify);
        }
    }

    public function addabout(Request $req){
        try{
            $coparate =new slider();
            $imageName = time().'.'.$req->image->extension();
            $req->image->move(public_path('upload/frontend'), $imageName);

            $coparate->image =  $imageName;
            $coparate->content = '';
            $coparate->type= $req->type;
            $coparate->save();
            $notify[] = ['success', 'Added successfully'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', ' Could not be Added .'];

            return back()->withNotify($notify);
        }
    }

    public function updateabout(Request $req)
    {
        try{
            $box = slider::findOrFail($req->id);
            if($req->image == '' || null){
                $imageName =$req->getimg;
            }
            else{
                $imageName = time().'.'.$req->image->extension();
                $req->image->move(public_path('upload/frontend'), $imageName);
                $filename = public_path('upload/frontend/'.$req->getimg);

                if(File::exists($filename)) {
                    File::delete($filename);
                }
            }

            $box->image = $imageName;
            $box->content = '';
            $box->type= $req->type;

            $box->save();
            $notify[] = ['success', ' Updated successfully'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Could not be Updated .'];

            return back()->withNotify($notify);
        }
    }


    public function Logo(Request $req)
    {
        try{



                $box = new slider();
                $imageName = time().'.'.$req->file('image')->extension();
                $req->file('image')->move(public_path('upload/frontend'), $imageName);
                $box->content = '';
                $box->image = $imageName;
                $box->type= $req->type;
                $box->save();


            $notify[] = ['success', ' Updated successfully'];
            return back()->withNotify($notify);


        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Could not be Updated .'];

            echo $e;
        }
    }

}
