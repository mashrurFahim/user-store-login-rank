<?php

namespace App\Http\Livewire;

use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AllStore extends Component
{
    use WithFileUploads;

    public $store;

    public $storeID;

    public $name;

    public $type;

    public $description;

    public $newImage;

    public $oldImage;

    public $isEditMode = false;

    public $isPostModalOpen = false;



    public function showStoreModal()
    {
        $this->reset();
        $this->isPostModalOpen = true;
    }

    public function showEditStoreModal($id)
    {
        $this->store = Store::findOrFail($id);
        $this->name = $this->store->name;
        $this->type = $this->store->type;
        $this->description = $this->store->description;
        $this->oldImage = $this->store->image;
        $this->isEditMode = true;
        $this->isPostModalOpen = true;
    }

    public function createStore()
    {

        $this->validate([
            'newImage' => 'image|max:1024',
            'name' => 'required',
            'type' => 'required',
        ]);

        $image = $this->newImage->store('public/stores');

        Store::create(
            [
                'user_id' => Auth::user()->id,
                'name' => $this->name,
                'image' => $image,
                'type' => $this->type,
                'description' => $this->description,
            ]
        );

        $this->reset();
    }

    public function updateStore()
    {
        $this->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $image = $this->store->image;

        if($this->newImage) {
            $image = $this->newImage->store('public/stores');
        }

        $this->store->update([
            'name' => $this->name,
            'image' => $image,
            'type' => $this->type,
            'description' => $this->description,

        ]);
        $this->reset();
    }

    public function deleteStore($id)
    {
        $store = Store::findOrFail($id);
        Storage::delete($store->image);
        $store->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.all-store', [
            'stores' => Store::all()
        ]);
    }


}
