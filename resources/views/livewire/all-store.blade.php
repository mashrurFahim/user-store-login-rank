<div>
    <div class="bg-white p-10 rounded-lg mx-8 shadow-md border-blue-300 w-mx-lg">
        <div class="inline-flex items-center">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white text-left">All Store List</h5>
            <x-jet-button
                class="px-4 py-2 font-semibold text-sm bg-blue-500 text-white rounded-full shadow-sm text-right"
                wire:click="showStoreModal">
                    Add store
            </x-jet-button>
        </div>

        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($stores as $store)
                    <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">

                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <img class="w-8 h-8 rounded-full" src="{{ Storage::url($store->image) }}" />
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            {{$store->id}}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            {{$store->name}}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{$store->type}}
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            @if (Auth::user()->id == $store->user_id)
                            <x-jet-button class="px-4 py-2 font-semibold text-sm bg-green-500 text-white rounded-full shadow-sm" wire:click="showEditStoreModal({{ $store->id }})" >Edit</x-jet-button>
                            <x-jet-button class="px-4 py-2 font-semibold text-sm bg-red-500 text-white rounded-full shadow-sm" wire:click="deleteStore({{ $store->id}})">Delete</x-jet-button>
                            @endif
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="m-2 p-2">
            <x-jet-dialog-modal wire:model="isPostModalOpen">

                @if($isEditMode)
                        <x-slot name="title">Update Store</x-slot>
                    @else
                        <x-slot name="title">Create Store</x-slot>
                    @endif
                <x-slot name="title">Create Store</x-slot>

                <x-slot name="content">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form enctype="multipart/form-data">

                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Store Name </label>
                                <div class="mt-1">
                                    <input type="text" id="name" wire:model.lazy="name" name="name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('name') <span class="text-red-400">{{ $message }}</span> @enderror
                            </div>

                            <div class="sm:col-span-6">
                                <div class="w-full m-2 p-2">
                                    @if ($oldImage)
                                    Current Image:
                                    <img src="{{ Storage::url($oldImage) }}">
                                    @endif
                                    @if ($newImage)
                                    Image Preview:
                                    <img src="{{ $newImage->temporaryUrl() }}">
                                    @endif
                                </div>
                                <label for="image" class="block text-sm font-medium text-gray-700"> Store Image </label>
                                <div class="mt-1">
                                    <input type="file" id="image" wire:model="newImage" name="newImage" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('newImage') <span class="text-red-400">{{ $message }}</span> @enderror
                            </div>

                            <div class="sm:col-span-6 pt-5">
                                <label for="type" class="block text-sm font-medium text-gray-700">Store Business Type</label>
                                <div class="mt-1">
                                    <input id="type" name="type" wire:model.lazy="type" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm" />
                                </div>
                                @error('type') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="sm:col-span-6 pt-5">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <div class="mt-1">
                                    <textarea id="description" rows="3" wire:model.lazy="description" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm "></textarea>
                                </div>
                                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </form>
                    </div>
                </x-slot>
                <x-slot name="footer">
                    @if($isEditMode)
                        <x-jet-button wire:click="updateStore">Update</x-jet-button>
                    @else
                        <x-jet-button wire:click="createStore">Create</x-jet-button>
                    @endif
                </x-slot>
            </x-jet-dialog-modal>
        </div>
    </div>
</div>
