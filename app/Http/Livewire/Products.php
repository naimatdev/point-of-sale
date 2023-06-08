<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $product_detail =[];
    public function mount()
    {
        // $this->product_detail =Product::all();
    }
    public function product_detail($product_id)
    {
        $this->product_detail=Product::where('id',$product_id)->get();
    }
    public function render()
    {
        return view('livewire.products', ['products'=> product::all()]);
    }
}
