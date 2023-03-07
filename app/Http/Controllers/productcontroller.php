<?php

namespace App\Http\Controllers;

use App\Models\box;
use App\Models\brand;
use App\Models\card;
use App\Models\Category;
use App\Models\color;
use App\Models\colormain;
use App\Models\fetuers;
use App\Models\giftvoucher;
use App\Models\giftvoucherprice;
use App\Models\image;
use App\Models\occasion;
use App\Models\optional;
use App\Models\Product;
use App\Models\readybox;
use App\Models\readytoship;
use App\Models\slider;
use App\Models\sticker;
use App\Models\subcategory;
use App\Models\subtosubcategory;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class productcontroller extends Controller
{
    //

    public function view()
    {

        $category = Category::all();
        $subcategory = subcategory::all();
        $secondsub = subtosubcategory::all();
        $brand = brand::all();
        $occasion = occasion::all();
        $colors = colormain::all();
        return view('admin.action.product', ['category' => $category, 'subcategory' => $subcategory, 'secondsub' => $secondsub, 'brand' => $brand, 'occasion' =>  $occasion, 'colors' => $colors, 'link' => 'add',]);
    }

    public function viewproduct()
    {
        $product = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->get(['products.pimage', 'products.id', 'products.name', 'products.title', 'products.short_description', 'products.regular_price', 'products.discount', 'products.stock_status', 'products.quantity', 'categories.cname', 'brands.bname']);
        return view('admin.action.viewproduct', ['product' => $product]);
    }
    public function save(Request $req)
    {
        try {
            $noimage = asset('upload/no-image.png');
            $name = $req->name;
            $title = $req->title;
            $sku = $req->sku;
            $category = $req->category;
            $subcategory = $req->subcategory;
            $secondsub = $req->secondsub;
            $price = $req->price;
            $discountprice = $req->discount;
            $qty = $req->qty;
            $stock_status = $req->stock_status;
            $size = $req->size;
            $short = $req->short;
            $discount = $req->disco;
            $product = new Product();
            $product->name = $name;
            $product->title = $title;
            $product->short_description = $short;
            $product->regular_price = $price;
            $product->SKU = $sku;
            $product->subcategory = $subcategory;
            $product->secondsub = $secondsub;
            $product->discountprice = $discountprice;
            $product->discount = $discount;
            $product->stock_status = $stock_status;
            $product->quantity = $qty;
            $product->size = $size ?? 0;
            $product->category_id = $category;
            $product->brand_id = $req->brand;
            $product->occasion = $req->occasion;
            $product->color_id = $req->pcolor;
            $imageName = time() . '.' . $req->pimage->extension();
            $req->pimage->move(public_path('upload'), $imageName);
            $product->pimage = $imageName ?? $noimage;
            $product->save();

            $last_id = $product->id;


            $img = array();
            if ($image = $req->file('image')) {

                foreach ($image as $files) {

                    $image_name = md5(rand(1000, 10000));
                    $ext = strtolower($files->getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $ext;
                    $uploadpath = 'upload/';
                    $files->move($uploadpath, $image_full_name);
                    $img[] =  $image_full_name;
                }
            } else {
                $img[] = $imageName;
            }

            $imgsave = new image();
            $imgsave->image = $name;
            $imgsave->images = implode('|', $img) ?? $noimage;
            $imgsave->product_id = $last_id;
            $imgsave->save();

            $length = $req->length;
            $request = $req->all();
            for ($i = 0; $i <= $length; $i++) {
                $col = $request['color' . $i];

                $color[] = $col;
            }
            $colorsave = new color();
            $colorsave->product_id = $last_id;
            $colorsave->color = implode('|', $color);
            $colorsave->save();

            $length1 = $req->length1;

            $request = $req->all();
            for ($a = 0; $a <= $length1; $a++) {
                $hed = $request['heading' . $a];
                $discription = $request['description' . $a];
                $heading[] = $hed;
                $des[] = $discription;
            }


            $save = new optional();
            $save->heading = implode('|', $heading) ?? 'details';
            $save->description = implode('|', $des) ?? '-';
            $save->product_id = $last_id;
            $save->save();

            $notify[] = ['success', 'Product has been added successfully .'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Product Could not be added .'];
            return back()->withNotify($notify);
        }
    }


    public function brand()
    {
    }

    public function remove(Request $req)
    {
        try {
            if ($req->type == 'product') {
                $delete = Product::where('id', '=', $req->id)->delete();
                if ($delete) {

                    return $this->removeimage($req->pimage);
                } else {
                    $notify[] = ['error', 'Product Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'category') {
                $category = Category::where('id', '=', $req->id)->delete();
                if ($category) {
                    $notify[] = ['success', 'Category has been Deleted successfully .'];
                    return back()->withNotify($notify);
                } else {
                    $notify[] = ['error', 'Category Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'sub') {
                $sub = subcategory::where('id', '=', $req->id)->delete();
                if ($sub) {
                    $notify[] = ['success', 'Subcategory has been Deleted successfully .'];
                    return back()->withNotify($notify);
                } else {
                    $notify[] = ['error', 'Subcategory Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'second') {
                $secind = subtosubcategory::where('id', '=', $req->id)->delete();
                if ($secind) {
                    $notify[] = ['success', 'Second sub has been Deleted successfully .'];
                    return back()->withNotify($notify);
                } else {
                    $notify[] = ['error', 'Second sub Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'brand') {
                $brand = brand::where('id', '=', $req->id)->delete();
                if ($brand) {
                    $notify[] = ['success', 'Brand been Deleted successfully .'];
                    return back()->withNotify($notify);
                } else {
                    $notify[] = ['error', 'Brand Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'box') {
                $box = box::where('id', '=', $req->id)->delete();
                if ($box) {

                    return $this->removeimage($req->pimage);
                } else {
                    $notify[] = ['error', 'Box Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'card') {
                $card = card::where('id', '=', $req->id)->delete();
                if ($card) {

                    return $this->removeimage($req->pimage);
                } else {
                    $notify[] = ['error', 'Card Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'sticker') {
                $stic = sticker::where('id', '=', $req->id)->delete();
                if ($stic) {

                    return $this->removeimage($req->pimage);
                } else {
                    $notify[] = ['error', 'Card Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'ship') {
                $ship = readytoship::where('id', '=', $req->id)->delete();
                if ($ship) {

                    $notify[] = ['success', 'Deleted successfully .'];
                    return back()->withNotify($notify);
                } else {
                    $notify[] = ['error', ' Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'shipbox') {
                $ship = readybox::where('id', '=', $req->id)->delete();
                if ($ship) {

                    return $this->removeimage($req->pimage);
                } else {
                    $notify[] = ['error', ' Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'voucher') {
                $ship = giftvoucher::where('id', '=', $req->id)->delete();
                if ($ship) {

                    return $this->removeimage($req->pimage);
                } else {
                    $notify[] = ['error', ' Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'price') {
                $ship = giftvoucherprice::where('id', '=', $req->id)->delete();
                if ($ship) {

                    return $this->removeimage($req->pimage);
                } else {
                    $notify[] = ['error', ' Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'slider') {
                $ship = slider::where('id', '=', $req->id)->delete();
                if ($ship) {

                    $filename = public_path('upload/frontend/' . $req->pimage);

                    if (File::exists($filename)) {
                        File::delete($filename);


                        $notify[] = ['success', ' Deleted successfully .'];
                        return redirect('/admin/add-home')->withNotify($notify);
                    }
                } else {
                    $notify[] = ['error', ' Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'partner') {
                $ship = slider::where('id', '=', $req->id)->delete();
                if ($ship) {

                    $filename = public_path('upload/frontend/' . $req->pimage);

                    if (File::exists($filename)) {
                        File::delete($filename);


                        $notify[] = ['success', ' Deleted successfully .'];
                        return redirect('/admin/partner')->withNotify($notify);
                    }
                } else {
                    $notify[] = ['error', ' Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            } elseif ($req->type == 'fetuers') {
                $ship = fetuers::where('id', '=', $req->id)->delete();
                if ($ship) {

                    $filename = public_path('upload/frontend/' . $req->pimage);

                    if (File::exists($filename)) {
                        File::delete($filename);


                        $notify[] = ['success', ' Deleted successfully .'];
                        return redirect('/admin/add-fetuers')->withNotify($notify);
                    }
                } else {
                    $notify[] = ['error', ' Could not be Deleted .'];
                    return back()->withNotify($notify);
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Could not be Deleted .'];
            return back()->withNotify($notify);
        }
    }

    public function removeimage($fileloc)
    {


        $filename = public_path('upload/' . $fileloc);

        if (File::exists($filename)) {
            File::delete($filename);


            $notify[] = ['success', ' Deleted successfully .'];
            return back()->withNotify($notify);
        }
    }

    public function editget(Request $req)
    {

        $product = Product::where('products.id', '=', $req->id)
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('subcategories', 'products.subcategory', '=', 'subcategories.id')
            ->join('subtosubcategories', 'products.secondsub', '=', 'subtosubcategories.id')
            ->join('occasions', 'products.occasion', '=', 'occasions.id')
            ->join('colormains', 'products.color_id', '=', 'colormains.id')
            ->get(['products.*', 'categories.cname', 'brands.bname', 'subcategories.sname', 'subtosubcategories.subname', 'occasions.occasionn', 'colormains.color']);
        $images = image::where('product_id', '=', $req->id)->get();

        $category = Category::all();
        $subcategory = subcategory::all();
        $secondsub = subtosubcategory::all();
        $brand = brand::all();
        $occasion = occasion::all();
        $colors = colormain::all();
        $color = color::where('product_id', '=', $req->id)->get();
        $optional = optional::where('product_id', '=', $req->id)->get();
        return view('admin.action.product', ['category' => $category, 'subcategory' => $subcategory, 'secondsub' => $secondsub, 'brand' => $brand, 'occasion' =>  $occasion, 'colors' => $colors, 'link' => 'edit', 'products' => $product, 'images' => $images, 'colorss' => $color, 'optionals' => $optional]);
    }

    public function update(Request $req)
    {
        try {
            //code...

            $name = $req->name;
            $title = $req->title;
            $sku = $req->sku;
            $category = $req->category;
            $subcategory = $req->subcategory;
            $secondsub = $req->secondsub;
            $price = $req->price;
            $discount = $req->disco;
            $discountprice =  $req->discount;

            $qty = $req->qty;
            $stock_status = $req->stock_status;
            $size = $req->size;
            $short = $req->short;
            if ($req->pimage == '') {
                $imageName = $req->gtimg;
            } else {
                $imageName = time() . '.' . $req->pimage->extension();
                $req->pimage->move(public_path('upload'), $imageName);
            }


            $update = Product::where('id', $req->id)->update([
                'name' => $name,
                'title' => $title,
                'short_description' => $short,
                'regular_price' => $price,
                'SKU' => $sku,
                'subcategory' => $subcategory,
                'secondsub' => $secondsub,
                'discountprice' => $discountprice,
                'discount' => $discount,
                'stock_status' => $stock_status,
                'quantity' => $qty,
                'category_id' => $category,
                'brand_id' => $req->brand,
                'occasion' => $req->occasion,
                'color_id' => $req->pcolor,
                'pimage' => $imageName,
                'size' => $size
            ]);

            $img = array();
            if ($image = $req->file('image')) {

                foreach ($image as $files) {

                    $image_name = md5(rand(1000, 10000));
                    $ext = strtolower($files->getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $ext;
                    $uploadpath = 'upload/';
                    $files->move($uploadpath, $image_full_name);
                    $img[] =  $image_full_name;
                }
                $image = image::where('product_id', $req->id)
                    ->update([
                        'image' => $req->name,
                        'images' => implode('|', $img)
                    ]);
            }
            $color = array();
            $length = $req->length;
            if ($length == '0') {
                for ($i = 0; $i <= $req->lengthcolor; $i++) {
                    if ($req['colorget' . $i] == '') {
                    } else {
                        $color[] = $req['colorget' . $i];
                    }
                }
                $colrs = color::where('product_id', $req->id)
                    ->update([
                        'color' => implode('|', $color)
                    ]);
            } else {
                if ($req->color_id == '0') {
                    for ($i = 1; $i <= $length; $i++) {
                        $color[] = $req['color' . $i];
                    }
                    $colrs1 = new color;
                    $colrs1->color = implode('|', $color);
                    $colrs1->product_id = $req->id;
                    $colrs1->save();
                } else {
                    for ($i = 0; $i <= $req->lengthcolor; $i++) {
                        if ($req['colorget' . $i] == '') {
                        } else {
                            $color[] = $req['colorget' . $i];
                        }
                    }
                    for ($i = 0; $i <= $length; $i++) {
                        if ($req['color' . $i] == '') {
                        } else {
                            $color[] = $req['color' . $i];
                        }
                    }
                    $colrs = color::where('product_id', $req->id)
                        ->update([
                            'color' => implode('|', $color)
                        ]);
                }
            }

            $hed = array();
            $des = array();
            $length1 = $req->length1;
            if ($length1 == '0') {
                for ($i = 0; $i <= $req->optionallength; $i++) {
                    if ($req['headingget' . $i] == '' || $req['descriptionget' . $i] == '') {
                    } else {
                        $hed[] = $req['headingget' . $i];
                        $des[] = $req['descriptionget' . $i];
                    }
                }
                $otional = optional::where('product_id', $req->id)
                    ->update([
                        'heading' => implode('|', $hed),
                        'description' => implode('|', $des)
                    ]);
            } else {
                if ($req->optionalid == '0') {
                    for ($i = 1; $i <= $length1; $i++) {
                        $hed[] = $req['heading' . $i];
                        $des[] = $req['description' . $i];
                    }
                    $opt = new optional();
                    $opt->heading = implode('|', $hed);
                    $opt->description = implode('|', $des);
                    $opt->product_id = $req->id;
                    $opt->save();
                } else {
                    for ($i = 0; $i <= $req->optionallength; $i++) {
                        if ($req['headingget' . $i] == '' || $req['descriptionget' . $i] == '') {
                        } else {
                            $hed[] = $req['headingget' . $i];
                            $des[] = $req['descriptionget' . $i];
                        }
                    }
                    for ($i = 0; $i <= $length1; $i++) {
                        if ($req['heading' . $i] == '' || $req['description' . $i] == '') {
                        } else {
                            $hed[] = $req['heading' . $i];
                            $des[] = $req['description' . $i];
                        }
                    }
                    $otional = optional::where('product_id', $req->id)
                        ->update([
                            'heading' => implode('|', $hed),
                            'description' => implode('|', $des)
                        ]);
                }
            }
            $notify[] = ['success', 'Product has been Updated successfully .'];
            return back()->withNotify($notify);
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'Product Could not be Update .'];
            return back()->withNotify($notify);
        }
    }


    public function search(Request $req)
    {
    }
}
