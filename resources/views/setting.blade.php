<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden mb-6 sm:rounded-lg">
                @if($slug=='gallery')
                <livewire:setting-gallery :slug="$slug" />
                @elseif($slug=='home-page')
                <livewire:setting-home-page :slug="$slug" />
                @else
                <livewire:settings :slug="$slug" />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
