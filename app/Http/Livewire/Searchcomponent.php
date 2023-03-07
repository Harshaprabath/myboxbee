<?php

namespace App\Http\Livewire;

use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;
use Livewire\Component;
use Product;

class Searchcomponent extends Component
{
    public $q;
    public function mount(Request $req)

    {

        $this->q = $req->q;



    }
    public function render()
    {
        try {
            $product =ModelsProduct::join('categories','products.category_id', '=', 'categories.id')
            ->join('brands','products.brand_id', '=', 'brands.id')
            ->join('subcategories','products.subcategory', '=', 'subcategories.id')
            ->where('categories.cname','=',$this->q)
            ->orwhere('products.name','=',$this->q)
            ->orwhere('brands.bname','=',$this->q)
            ->orwhere('subcategories.sname','=',$this->q)
            -> get(['products.*']);

            return view('livewire.searchcomponent',['products' => $product,'error'=>'0','result'=>$this->q])->layout('layout.base');
        } catch (\Illuminate\Database\QueryException $e) {
            $notify[] = ['error', 'something error please re-try.'];
            return view('livewire.searchcomponent',['error' => '1'])->layout('layout.base');
        }

    }
}
