<?php

namespace App\Http\Livewire;

use App\Models\color;
use App\Models\image;
use App\Models\optional;
use App\Models\Product;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $pid;
    public function mount($id)
    {
        $this->pid = $id;
    }
    public function render()
    {
        $product = Product::where('id',$this->pid)->first();
        $image = image::where('product_id',$this->pid)->get();
        $color = color::where('product_id',$this->pid)->get();
        $populler_product = Product::inRandomOrder()->limit(4)->get();
        // $related_product = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        $optional = optional::where('product_id',$this->pid)->get();
        return view('livewire.details-component',['product' => $product,'populler_product'=>$populler_product,'images'=>$image,'colors'=>$color,'optionals' => $optional])-> layout('layout.base') ;
    }
}
