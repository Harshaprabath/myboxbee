<?php

namespace App\Http\Livewire;

use App\Models\box;
use App\Models\brand;
use App\Models\card;
use App\Models\Category;
use App\Models\colormain;
use App\Models\giftvoucher;
use App\Models\giftvoucherprice;
use App\Models\Product;
use App\Models\sticker;
use App\Models\subcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use ShoppingCart;

class GiftBoxComponent extends Component
{
    public $currentStep = 0;

    public $link;

    public $products;

    public $cards;


    protected $listeners = ['refreshComponent' =>'$refresh'];
    
    public function mount()
    {
        if (Session::has('builder_step')) {
            $this->currentStep = Session::get('builder_step');
        } else {
                    $this->currentStep =0;
            Session::put('builder_step', $this->currentStep);
        }



        $cards = card::all();

        $this->cards = $cards;

    }
    
    public function render()
    {
        $user_id = Auth::id();
        $category = Category::all();
        $subCategory = subcategory::all();
        $brand = brand::all();
        $color = colormain::all();
        $stickers = sticker::all();
        $vouchers = giftvoucher::all();
        
        
        return view('livewire.gift-box-component', ['category'=>$category, 'subCategory'=>$subCategory, 'brand'=>$brand, 'color'=>$color, 'stickers'=>$stickers, 'vouchers'=>$vouchers])->layout('layout.custom');
    }

        // go to next step
        public function nextStep()
        {
            $cartItems = ShoppingCart::content();
                $getExist = $cartItems->contains(function ($item, $key) {
                    return $item->options->status2 == 'box';
                });

                if ($getExist) {
                    $this->currentStep += 1;
                } else {

                    $this->currentStep =0;
                }

            Session::put('builder_step', $this->currentStep);
        }
    
        // go to previous step
        public function previousStep()
        {
            if ($this->currentStep > 0) {
                $this->currentStep -= 1;
                Session::put('builder_step', $this->currentStep);
            }
        }
        // go to step
        public function gotoStep($step) {
            
            $cartItems = ShoppingCart::content();
            $getExist = $cartItems->contains(function ($item, $key) {
                return $item->options->status2 == 'box';
            });

            if ($getExist) {
                $this->currentStep = $step;
            } else {

                $this->currentStep =0;
            }
            Session::put('builder_step', $this->currentStep);
        }

        public function getProducts($filter, $sort='') {
            $this->filterBy = $filter;
            $this->sortBy = $sort;

            if ($this->filterBy == 'all') {

                $product = Product::join('images', 'products.id', '=', 'images.product_id')
                    ->join('colors', 'products.id', '=', 'colors.product_id')
                    ->join('optionals', 'products.id', '=', 'optionals.product_id')
                    ->get(['products.*', 'images.*', 'optionals.*']);
            } else {
                $product = Product::join('images', 'products.id', '=', 'images.product_id')
                    ->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->join('subcategories', 'products.subcategory', '=', 'subcategories.id')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->join('colormains', 'products.color_id', '=', 'colormains.id')
                    ->join('optionals', 'products.id', '=', 'optionals.product_id')
                    ->where('categories.cname', '=', $this->filterBy)
                    ->orwhere('brands.bname', '=', $this->filterBy)
                    ->orwhere('subcategories.sname', '=', $this->filterBy)
                    ->orwhere('colormains.color', '=', $this->filterBy)
                    ->get(['products.*', 'images.*', 'optionals.*']);
            }
            // $product = Product::paginate(24);
            if ($this->sortBy == 'price-ascending') {
                $product = Product::join('images', 'products.id', '=', 'images.product_id')
                    ->join('colors', 'products.id', '=', 'colors.product_id')
                    ->join('optionals', 'products.id', '=', 'optionals.product_id')
                    ->orderBy('products.regular_price', 'asc')
                    ->get(['products.*', 'images.*', 'optionals.*']);
            } elseif ($this->sortBy == 'price-descending') {
                $product = Product::join('images', 'products.id', '=', 'images.product_id')
                    ->join('colors', 'products.id', '=', 'colors.product_id')
                    ->join('optionals', 'products.id', '=', 'optionals.product_id')
                    ->orderBy('products.regular_price', 'desc')
                    ->get(['products.*', 'images.*', 'optionals.*']);
            } elseif ($this->sortBy == 'title-ascending') {
                $product = Product::join('images', 'products.id', '=', 'images.product_id')
                    ->join('colors', 'products.id', '=', 'colors.product_id')
                    ->join('optionals', 'products.id', '=', 'optionals.product_id')
                    ->orderBy('products.title', 'asc')
                    ->get(['products.*', 'images.*', 'optionals.*']);
            } elseif ($this->sortBy == 'title-descending') {
                $product = Product::join('images', 'products.id', '=', 'images.product_id')
                    ->join('colors', 'products.id', '=', 'colors.product_id')
                    ->join('optionals', 'products.id', '=', 'optionals.product_id')
                    ->orderBy('products.title', 'desc')
                    ->get(['products.*', 'images.*', 'optionals.*']);
            } elseif ($this->sortBy == 'created-ascending') {
                $product = Product::join('images', 'products.id', '=', 'images.product_id')
                    ->join('colors', 'products.id', '=', 'colors.product_id')
                    ->join('optionals', 'products.id', '=', 'optionals.product_id')
                    ->orderBy('products.created_at', 'asc')
                    ->get(['products.*', 'images.*', 'optionals.*']);
            } elseif ($this->sortBy == 'created-descending') {
                $product = Product::join('images', 'products.id', '=', 'images.product_id')
                    ->join('colors', 'products.id', '=', 'colors.product_id')
                    ->join('optionals', 'products.id', '=', 'optionals.product_id')
                    ->orderBy('products.created_at', 'desc')
                    ->get(['products.*', 'images.*', 'optionals.*']);
            } elseif ($this->sortBy == 'best-selling') {
                $product = Product::join('images', 'products.id', '=', 'images.product_id')
                    ->join('colors', 'products.id', '=', 'colors.product_id')
                    ->join('optionals', 'products.id', '=', 'optionals.product_id')
                    ->orderBy('products.created_at', 'desc')
                    ->get(['products.*', 'images.*', 'optionals.*']);
            } elseif ($this->link == 'colors') {
                $product = Product::join('images', 'products.id', '=', 'images.product_id')
                    ->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->join('subcategories', 'products.subcategory', '=', 'subcategories.id')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->join('colormains', 'products.color_id', '=', 'colormains.id')
                    ->join('optionals', 'products.id', '=', 'optionals.product_id')
                    ->where('colormains.color', '=', 'red')
                    ->get(['products.*', 'images.*', 'optionals.*']);
            }

            $this->products = $product;
        }

        public function getCards() {
            if ($this->link == 'card') {
                $key = $_REQUEST['filter'];
                $cards = card::where('cat_id', '=', $key)->get();
            } else {
                $cards = card::all();
            }

            $this->cards = $cards;
        }
}
