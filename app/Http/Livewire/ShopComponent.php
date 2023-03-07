<?php

namespace App\Http\Livewire;

use App\Models\box;
use App\Models\brand;
use App\Models\card;
use App\Models\Category;
use App\Models\colormain;
use App\Models\occasion;
use App\Models\Product;
use App\Models\sticker;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Request;
class ShopComponent extends Component
{
    use WithPagination;
     public $link;
        public function mount($url)
        {
            $this->link = $url;
        }
        public function render()
        {

            if($this->link == 'all'){

                $product =Product::join('images','products.id', '=', 'images.product_id')
                ->join('colors','products.id', '=', 'colors.product_id')
                -> select(['products.*','images.*'])
                ->paginate(20);
            }
            else{

                $product =Product::join('images','products.id', '=', 'images.product_id')
                ->join('colors','products.id', '=', 'colors.product_id')
                ->where('category_id','=',$this->link)
                ->orwhere('color_id','=',$this->link)
                ->orwhere('brand_id','=',$this->link)
                ->orwhere('occasion','=',$this->link)
                -> get(['products.*','images.*']);
            }
            // $product = Product::paginate(24);
    if(Request::get('sort') == 'price-ascending')
            {
                $product =Product::join('images','products.id', '=', 'images.product_id')
                ->join('colors','products.id', '=', 'colors.product_id')
                ->orderBy('products.regular_price','asc')
                -> get(['products.*','images.*']);

            }
            elseif(Request::get('sort') == 'price-descending'){
                $product =Product::join('images','products.id', '=', 'images.product_id')
                ->join('colors','products.id', '=', 'colors.product_id')
                ->orderBy('products.regular_price','desc')
                -> get(['products.*','images.*']);
            }
            elseif(Request::get('sort') == 'title-ascending'){
                $product =Product::join('images','products.id', '=', 'images.product_id')
                ->join('colors','products.id', '=', 'colors.product_id')
                ->orderBy('products.title','asc')
                -> get(['products.*','images.*']);
            }
            elseif(Request::get('sort') == 'title-descending'){
                $product =Product::join('images','products.id', '=', 'images.product_id')
                ->join('colors','products.id', '=', 'colors.product_id')
                ->orderBy('products.title','desc')
                -> get(['products.*','images.*']);
            }
            elseif(Request::get('sort') == 'created-ascending'){
                $product =Product::join('images','products.id', '=', 'images.product_id')
                ->join('colors','products.id', '=', 'colors.product_id')
                ->orderBy('products.created_at','asc')
                -> get(['products.*','images.*']);
            }
            elseif(Request::get('sort') == 'created-descending'){
                $product =Product::join('images','products.id', '=', 'images.product_id')
                ->join('colors','products.id', '=', 'colors.product_id')
                ->orderBy('products.created_at','desc')
                -> get(['products.*','images.*']);
            }
            elseif(Request::get('sort') == 'best-selling'){
                $product =Product::join('images','products.id', '=', 'images.product_id')
                ->join('colors','products.id', '=', 'colors.product_id')
                ->orderBy('products.created_at','desc')
                -> get(['products.*','images.*']);
            }
            $sticker =sticker::all();
            $card = card::all();
            $box = box::all();
            $category = Category::all();
            $brand = brand::all();
            $ocassion = occasion::all();
            $clor = colormain::all();

            return view('livewire.shop-component',['products' => $product,'box' => $box,'sticker' => $sticker,'card'=>$card,'category'=> $category,'brand'=> $brand,'ocassion'=>$ocassion,'color' => $clor,'url'=>$this->link]) -> layout('layout.base');
        }


}
