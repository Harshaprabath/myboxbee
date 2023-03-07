<?php

namespace App\Http\Controllers;

use App\Models\giftvoucher;
use App\Models\giftvoucherprice;
use App\Models\readytoship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class GiftvoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.action.giftvoucher',['url'=>'add']);
    }
    public function indexprice(){
        return view('admin.action.giftvoucherprice',['url'=>'add']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
      $giftvoucher = new giftvoucher();
      $giftvoucher->name = $request->name;
      $giftvoucher->title = $request->title;
      $imageName = time().'.'.$request->image->extension();
      $request->image->move(public_path('upload'), $imageName);
      $giftvoucher->image = $imageName;
      $giftvoucher->save();
      $notify[] = ['success', 'Added Scuccessfully.'];
        return back()->withNotify($notify);
    }
      catch (\Illuminate\Database\QueryException $e) {
        $notify[] = ['error', 'Could not be Added .'];
        return back()->withNotify($notify);
    }
    }
    public function storeprice(Request $request){
        try{
        $giftvoucher = new giftvoucherprice();
        $giftvoucher->price = $request->price;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('upload'), $imageName);
        $giftvoucher->image = $imageName;
        $giftvoucher->save();
        $notify[] = ['success', 'Added Scuccessfully.'];
        return back()->withNotify($notify);
    }
      catch (\Illuminate\Database\QueryException $e) {
        $notify[] = ['error', 'Could not be Added .'];
        return back()->withNotify($notify);
    }
    }

    public function Listvoucher(){
        try{
            $ready= giftvoucher::all();
            return view('admin.action.listvoucher',['voucher' => $ready,'url'=>'add']);
             }
             catch (\Illuminate\Database\QueryException $e) {
                $notify[] = ['error', 'Readytoship Could not be fetch .'];
                return back()->withNotify($notify);
            }
    }
    public function Listvoucherprice(){
        try{
            $ready= giftvoucherprice::all();
            return view('admin.action.listvoucheprice',['voucher' => $ready,'url'=>'add']);
             }
             catch (\Illuminate\Database\QueryException $e) {
                 $notify[] = ['error', 'Readytoship Could not be fetch .'];
                 return back()->withNotify($notify);
             }
    }
    public function Editvoucher($id){
        try{
            $ready = giftvoucher::find($id);
            return view('admin.action.giftvoucher',['voucher' => $ready,'url'=>'edit']);
             }
             catch (\Illuminate\Database\QueryException $e) {
                 $notify[] = ['error', 'voucher Could not be fetch .'];
                 return back()->withNotify($notify);
             }
    }
    public function voucherupdate(Request $req){
        try{
            $box = giftvoucher::findOrFail($req->id);
            $box->name = $req->name;
            $box->title = $req->title;
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
            $notify[] = ['success', ' Updated successfully'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', ' Could not be Updated .'];
            return back()->withNotify($notify);
        }
    }

    public function Editvoucherprice($id){
        try{
            $ready = giftvoucherprice::find($id);
            return view('admin.action.giftvoucherprice',['voucher' => $ready,'url'=>'edit']);
             }
             catch (\Illuminate\Database\QueryException $e) {
                 $notify[] = ['error', 'voucher Could not be fetch .'];
                 return back()->withNotify($notify);
             }
    }
    public function voucherpriceupdate(Request $req){
        try{
            $box = giftvoucherprice::findOrFail($req->id);
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
            $notify[] = ['success', ' Updated successfully'];
            return back()->withNotify($notify);
        }
        catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', ' Could not be Updated .'];
            return back()->withNotify($notify);
        }
    }
}
