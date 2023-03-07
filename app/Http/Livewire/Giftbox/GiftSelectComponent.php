<?php

namespace App\Http\Livewire\Giftbox;

use App\Models\brand;
use App\Models\Category;
use App\Models\colormain;
use App\Models\Product;
use App\Models\subcategory;
use Exception;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use ShoppingCart;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class GiftSelectComponent extends Component
{

    use LivewireAlert;

    public $products;

    public $filterBy = 'all';

    public $sortBy = 'price-ascending';

    protected $listeners = ['refreshComponent' =>'$refresh'];

    public function mount() {

        $product = Product::join('images', 'products.id', '=', 'images.product_id')
        ->join('colors', 'products.id', '=', 'colors.product_id')
        ->join('optionals', 'products.id', '=', 'optionals.product_id')
        ->get(['products.*', 'images.*', 'optionals.*']);

        $this->products = $product;
    }

    public function render()
    {
        $category = Category::orderBy('order')->get();
        $subCategory = subcategory::all();
        $brand = brand::all();
        $color = colormain::all();
        return view('livewire.giftbox.gift-select-component', ['category'=>$category, 'subCategory'=>$subCategory, 'brand'=>$brand, 'color'=>$color]);
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
        } 
        // elseif ($this->link == 'colors') {
        //     $product = Product::join('images', 'products.id', '=', 'images.product_id')
        //         ->join('brands', 'products.brand_id', '=', 'brands.id')
        //         ->join('subcategories', 'products.subcategory', '=', 'subcategories.id')
        //         ->join('categories', 'products.category_id', '=', 'categories.id')
        //         ->join('colormains', 'products.color_id', '=', 'colormains.id')
        //         ->join('optionals', 'products.id', '=', 'optionals.product_id')
        //         ->where('colormains.color', '=', 'red')
        //         ->get(['products.*', 'images.*', 'optionals.*']);
        // }

        $this->products = $product;
        $this->emitTo('giftbox.gift-box-preview-component', 'refreshComponent');
    }

    public function addGiftsToCart($itemId) {
        try {
            $item = Product::find($itemId);
            if ($item->discount == '0') {
                $price = $item->regular_price;
            } else {
                $price = $item->discountprice;
            }

            $data = [
                'image'=>$item->pimage,
                'from' => '',
                'to' => '',
                'message' => '',
                'status' => 'box',
                'status2' => 'gift',
                'type' => '',
                'font' => '',
                'card' => '',
            ];

            ShoppingCart::add($itemId, $item->name, 1 , $price, [...$data]);

            $this->emitTo('giftbox.gift-box-preview-component', 'refreshComponent');
            $this->emitTo('cart.cart-icon-component', 'refreshComponent');
            $this->emitUp('refreshComponent');

            $this->alert('success', 'Success', [
                'position' => 'top-end',
                'timer' => 3000,
                'timerProgressBar' => true,
                'text'=>'Item Successfully added...'
            ]);
        } catch (Exception $ex) {
            $this->alert('error', 'Error', [
                'position' => 'top-end',
                'timer' => 3000,
                'timerProgressBar' => true,
                'text'=>'Oops! Somthing Went Wrong. Try Again!'
            ]);
        }

    }
}
