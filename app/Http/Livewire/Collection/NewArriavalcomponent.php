<?php

namespace App\Http\Livewire\Collection;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
class NewArriavalcomponent extends Component
{

    use WithPagination;
    public function render()
    {  $product = Product::paginate(12);
        return view('livewire.collection.new-arriavalcomponent',['products' => $product])->layout('layout.base');
    }
}
