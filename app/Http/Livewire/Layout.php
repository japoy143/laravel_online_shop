<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Layout extends Component
{
    public int $cartCount = 0;

    public ?User $user;

    public function mount()
    {
        $this->user = Auth::check() ? Auth::user() : null;

        if ($this->user) {
            $this->cartCount = $this->user->customer->cart->count() ?? 0;
        } else {
            $this->cartCount = 0;
        }
    }




    public function render()
    {
        return view('livewire.layout');
    }
}
