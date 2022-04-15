<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-10xl mx-auto sm:px-6 lg:px-8 flex justify-evenly">
            <livewire:user-list />
            <livewire:all-store />
            <livewire:my-store />
        </div>
    </div>
</x-app-layout>
