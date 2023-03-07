<?php

namespace App\Http\Livewire\Collection;

use Livewire\Component;

class Cosmeticcomponent extends Component
{
    public $link;
    public function mount($url)
    {
        $this->link = $url;
    }
    public function render()
    {
        return view('livewire.collection.cosmeticcomponent',['url' => $this->link])->layout('layout.base');
       
    }
}
