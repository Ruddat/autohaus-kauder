<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class Wishlist extends Component
{
    public $v;          // Fahrzeug-Objekt
    public $wishlist = [];

    public function mount(Vehicle $v)
    {
        $this->v = $v;
        $this->wishlist = session()->get('wishlist', []);
    }

    public function toggle($id)
    {
        $list = $this->wishlist;

        if (in_array($id, $list)) {
            $list = array_diff($list, [$id]);
        } else {
            $list[] = $id;
        }

        $this->wishlist = $list;

        session()->put('wishlist', $list);
    }

    public function render()
    {
        return view('livewire.wishlist');
    }
}
