<?php

namespace App\Http\Livewire;

use App\Models\Store;
use Livewire\Component;

class MyStore extends Component
{
    public function render()
    {
        return view('livewire.my-store', [
            'my_stores' => Store::all()
        ]);
    }
}
