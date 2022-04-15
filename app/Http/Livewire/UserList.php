<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserList extends Component
{

    public $all_users;

    public function render()
    {
        $this->all_users = User::all();
        return view('livewire.user-list');
    }
}
