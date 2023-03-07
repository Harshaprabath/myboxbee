<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\cardcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class carcontroller extends Controller
{
    //
    public function addcard(Request $req)
    {
        try {
            $card = new card();
            $card->name = $req->name;
            $card->price = $req->price;
            $card->title = $req->title;
            $card->cat_id = $req->category;
            $card->description = $req->description;
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('upload'), $imageName);

            $imageName1 = time() . '1.' . $req->image1->extension();
            $req->image1->move(public_path('upload'), $imageName1);
            $card->image = $imageName;
            $card->image1 = $imageName1;
            $card->save();
            $notify[] = ['success', 'Card  has been added successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'card Could not be added .'];
            return back()->withNotify($notify);
        }
    }
    public function addcardcategory(Request $req)
    {
        try {
            $card = new cardcategory();
            $card->category = $req->name;

            $card->save();
            $notify[] = ['success', 'Card Category has been added successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'card Category Could not be added .'];
            return back()->withNotify($notify);
        }
    }

    public function cardview(Request $req)
    {
        try {
            $card = card::join('cardcategories','cards.cat_id','=','cardcategories.id')->get(['cards.*','cardcategories.category']);
            $category = cardcategory::all();
            return view('admin.action.card', ['cards' => $card,'url'=>'add','category'=>$category]);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'card Could not be fetch .'];
            return back()->withNotify($notify);
        }
    }
    public function edit($id)
    {
        try {
            $card = card::find($id);
            $category = cardcategory::all();

            $categ = cardcategory::find($card->cat_id);
            return view('admin.action.addcard', ['cards' => $card, 'url' => 'edit','category'=>$category,'cat'=>$categ]);
        } catch (\Illuminate\Database\QueryException $e) {
            // $notify[] = ['error', 'Card Could not be Fetch .'];
            // return back()->withNotify($notify);
            echo $e;
        }
    }
    public function editcategory($id)
    {
        try {
            $cards = cardcategory::all();
            $card = cardcategory::find($id);
            return view('admin.action.cardcategory', ['cards' => $cards,'card'=>$card, 'url' => 'edit']);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Box Could not be Fetch .'];
            return back()->withNotify($notify);
        }
    }


    public function cardupdate(Request $req)
    {
        try {
            $card = card::findOrFail($req->id);
            $card->name = $req->name;
            $card->title = $req->title;
            $card->price = $req->price;
            $card->cat_id = $req->category;
            $card->description = $req->description;
            if ($req->image == '' || null) {
                $imageName = $req->getimg;
            } else {
                $imageName = time() . '.' . $req->image->extension();
                $req->image->move(public_path('upload'), $imageName);
                $filename = public_path('upload/' . $req->getimg);

                if (File::exists($filename)) {
                    File::delete($filename);
                }
            }
            if ($req->image1 == '' || null) {
                $imageName1 = $req->getimg1;
            } else {
                $imageName1 = time() . '.' . $req->image1->extension();
                $req->image1->move(public_path('upload'), $imageName1);
                $filename1 = public_path('upload/' . $req->getimg1);

                if (File::exists($filename1)) {
                    File::delete($filename1);
                }
            }
            $card->image = $imageName;
            $card->image1 = $imageName1;
            $card->save();
            $notify[] = ['success', 'Crad has been Updated successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Card Could not be Updated .'];
            return back()->withNotify($notify);
        }
    }
    public function cardcategoryupdate(Request $req)
    {
        try {

            $card = cardcategory::findOrFail($req->id);
            $card->category = $req->name;
            $card->save();
            $notify[] = ['success', 'Crad Category has been Updated successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Card Category Could not be Updated .'];
            return back()->withNotify($notify);
        }
    }

   public function categorycard(){
    try {
        $card = cardcategory::all();
        return view('admin.action.cardcategory', ['cards' => $card, 'url' => 'add']);
    } catch (\Illuminate\Database\QueryException $e) {
        $notify[] = ['error', 'card Could not be Fetch .'];
        return back()->withNotify($notify);
    }
   }

   public function remove(Request $req){
       try{
    $delete = cardcategory::where('id','=',$req->id)->delete();
    if($delete){
        $notify[] = ['success', ' Deleted successfully.'];
        return back()->withNotify($notify);

    }
    else{
     $notify[] = ['error', ' Could not be Deleted .'];
     return back()->withNotify($notify);
    }
   }
 catch (\Illuminate\Database\QueryException $e) {
    $notify[] = ['error', 'Could not be Deleted .'];
    return back()->withNotify($notify);
}

   }
}
