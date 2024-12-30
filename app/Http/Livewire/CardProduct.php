<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardProduct extends Component
{
    // @props(['product', 'active' => false, 'edit' => false])

    public Product $product;

    public bool $active = false;

    public bool $edit = false;


    public function mount(Product $product)
    {

        $this->product = $product;
    }


    public function delete(int $productid)
    {

        $this->emit("deleteData", ["id" => Auth::user()->id]);
    }

    public function render()
    {
        return view('livewire.card-product');
    }
}
