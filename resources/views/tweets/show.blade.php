<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweet de {{ $tweet->user->name }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <p class="text-gray-700 text-lg">{{ $tweet->text }}</p>
                <img src="{{Storage::url($tweet->img)}}" alt="Image du tweet">
            </div>
        </div>
    </div>
</x-app-layout>
