<div>
    <div class="p-4 max-w-lg bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700 mx-4">
        <div class="flex justify-between items-center">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">My Store List</h5>
        </div>
    <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($my_stores as $store)
                    @if (Auth::user()->id == $store->user_id)
                        <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">

                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <img class="w-8 h-8 rounded-full" src="{{ Storage::url($store->image) }}" />
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                {{$store->id}}
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                {{$store->user_id}}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{$store->name}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{$store->type}}
                                </p>
                            </div>
                        </div>
                    </li>
                    @endif

                        {{-- <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <x-jet-button class="px-4 py-2 font-semibold text-sm bg-green-500 text-white rounded-full shadow-sm" wire:click="showEditStoreModal({{ $store->id }})" >Edit</x-jet-button>
                            <x-jet-button class="px-4 py-2 font-semibold text-sm bg-red-500 text-white rounded-full shadow-sm" wire:click="deleteStore({{ $store->id}})">Delete</x-jet-button>
                        </div> --}}

                @endforeach
            </ul>
        </div>
    </div>
</div>
