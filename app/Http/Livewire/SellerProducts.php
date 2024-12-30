<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;


class SellerProducts extends Component
{

    public int $sellerId;
    public Collection $selectedProduct;

    protected $listeners = ["deleteData"];

    public function mount(int $user)
    {
        $this->sellerId = $user;
        $this->loadProducts();  
    }

    public function deleteData($payload)
    {
        $this->sellerId = $payload['id'];
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $seller = Seller::findOrFail($this->sellerId);
        $this->selectedProduct = $seller->products()->latest()->get();
    }



    public function render()
    {
        return view('livewire.seller-products', ['products' => $this->selectedProduct])
            ->layout('layouts.app');
    }
}
