<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweet de {{ $tweet->user->name }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white/10">
                <p class="text-black/90 text-lg">{{ $tweet->text }}</p>
                @if($tweet->img)
                    <img src="{{ asset('storage/' . $tweet->img) }}" alt="{{ $tweet->text }}" class="mb-4">
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
