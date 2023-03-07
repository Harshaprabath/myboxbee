<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\Category;
use App\Models\color;
use App\Models\colormain;
use App\Models\occasion;
use App\Models\Product;
use App\Models\subcategory;
use App\Models\subtosubcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {

        $category = Category::all();
        $categories = Category::all();
        $subcategory = subcategory::all();
        return view('admin.action.addcategory', [
            'category' => $category,
            'categories' => $categories,
            'sub' => $subcategory
        ]);
    }
    public function subcategorybview()
    {
        $category = Category::all();
        $subcategory = subcategory::join('categories', 'subcategories.category_id', '=', 'categories.id')->get(['subcategories.*', 'categories.cname']);
        return view('admin.action.subcategory', ['cats' => $category, 'sub' => $subcategory]);
    }
    public function seconsubview(Request $req)
    {

        $subcategory = subcategory::all();
        $second = subtosubcategory::join('subcategories', 'subtosubcategories.subcategory_id', '=', 'subcategories.id')->get(['subtosubcategories.*', 'subcategories.sname']);
        return view('admin.action.secondsub', ['seconds' => $second, 'sub' => $subcategory]);
    }
    public function addcategory(Request $req)
    {
        try {
            $maxOrderId = Category::max('order');           
            $category = new Category();
            $category->cname = $req->categoryname;
            $category->slug = $req->categoryname;
            $category->save();    
            
            $category->update([
                'order' => ++$maxOrderId
            ]);
            $notify[] = ['success', 'Category  has been added successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Category Could not be added .'];
            return back()->withNotify($notify);
        }
    }
    public function updatecategory(Request $req)
    {
        try {
            $cat = Category::findOrFail($req->id);
            $cat->cname = $req->categoryname;
            $cat->save();
            $notify[] = ['success', 'Category  has been updated successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Category Could not be updated .'];
            return back()->withNotify($notify);
        }
    }
    public function updatesubcategory(Request $req)
    {
        try {
            if ($req->category == '' || null) {
                $cat_id = $req->cat_id;
            } else {
                $cat_id = $req->category;
            }
            $cat = subcategory::findOrFail($req->id);
            $cat->category_id = $cat_id;
            $cat->sname = $req->subname;
            $cat->save();
            $notify[] = ['success', 'SubCategory  has been updated successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'SubCategory Could not be updated .'];
            return back()->withNotify($notify);
        }
    }

    public function updatesecondsub(Request $req)
    {
        try {
            if ($req->subcategory == '' || null) {
                $cat_id = $req->subcat_id;
            } else {
                $cat_id = $req->subcategory;
            }
            $cat = subtosubcategory::findOrFail($req->id);
            $cat->subcategory_id = $cat_id;
            $cat->subname = $req->subname;
            $cat->save();
            $notify[] = ['success', 'Second Sub  has been updated successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Second Sub Could not be updated .'];
            return back()->withNotify($notify);
        }
    }
    public function updatebrand(Request $req)
    {
        try {

            if ($req->shortcut1 == '' || null) {
                $cat_id = $req->shortcut;
            } else {
                $cat_id = $req->shortcut1;
            }
            $cat = brand::findOrFail($req->id);
            $cat->shortcut = $cat_id;
            $cat->bname = $req->bname;
            $cat->save();
            $notify[] = ['success', 'Brand  has been updated successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Brand Could not be updated .'];
            return back()->withNotify($notify);
        }
    }
    public function updatecolor(Request $req)
    {
        try {
            $cat = Category::findOrFail($req->id);
            $cat->cname = $req->categoryname;
            $cat->save();
            $notify[] = ['success', 'Category  has been updated successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Category Could not be updated .'];
            return back()->withNotify($notify);
        }
    }

    public function updatecocasion(Request $req)
    {
        try {
            $cat = Category::findOrFail($req->id);
            $cat->cname = $req->categoryname;
            $cat->save();
            $notify[] = ['success', 'Category  has been updated successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Category Could not be updated .'];
            return back()->withNotify($notify);
        }
    }

    public function categoryview()
    {

        $category = Category::all();
        return view('admin.action.category', ['category' => $category]);
    }

    public function addsubcategory(Request $req)
    {
        try {
            $subcategory = new subcategory();
            $subcategory->sname = $req->subname;
            $subcategory->category_id = $req->category;
            $subcategory->save();
            $notify[] = ['success', 'SubCategory  has been added successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'SubCategory Could not be added .'];
            echo $e;
            // return back()->withNotify($notify);
        }
    }
    public function subtosub(Request $req)
    {
        try {
            $sub = new subtosubcategory();
            $sub->subname = $req->subtosub;
            $sub->subcategory_id = $req->subcategory;
            $sub->save();
            $notify[] = ['success', 'substosub  has been added successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'substosub Could not be added .'];
            return back()->withNotify($notify);
        }
    }
    public function brand(Request $req)
    {
        try {
            $brand = new brand();
            $brand->bname = $req->brand;
            $brand->shortcut = $req->short;
            $brand->save();
            $notify[] = ['success', 'Brand  has been added successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Brand Could not be added .'];
            return back()->withNotify($notify);
        }
    }
    public function brandview()
    {

        $brand = brand::all();
        return view('admin.action.brand', ['brand' => $brand]);
    }

    public function color(Request $req)
    {
        try {
            $color = new colormain();
            $color->color = $req->color;
            $color->title = $req->title;
            $color->save();
            $notify[] = ['success', 'Color  has been added successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Color Could not be added .'];
            return back()->withNotify($notify);
        }
    }

    public function occasion(Request $req)
    {
        try {
            $ocasion = new occasion();
            $ocasion->occasionn = $req->occasion;
            $ocasion->title = $req->title;
            $ocasion->save();
            $notify[] = ['success', 'Occasion  has been added successfully'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Occasion Could not be added .'];
            return back()->withNotify($notify);
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();
        $notify[] = ['success', ' Deleted successfully.'];
        return back()->withNotify($notify);
    }
}
