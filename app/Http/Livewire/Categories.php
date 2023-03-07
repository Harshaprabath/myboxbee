<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public function render()
    {
        $categories = Category::orderBy('order')->get();
        return view('livewire.categories', compact('categories'));
    }
    public function updateCategoryOrder($list)
    {
        foreach ($list as $item) {
            Category::find($item['value'])->update(['order' => $item['order']]);
        }
    }
}
