<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweet de {{ $user->name }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white/10">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($tweets as $tweet)
                    <a href="{{ route('tweets.show', ['id' => $tweet->id]) }}">
                        <div class="h-full rounded overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:bg-slate-600">
                            <div class="h-full px-6 py-4 border-2 border-purple-800/50">
                                <div class="text-black/75 hover:text-white text-sm mb-2">{{ $tweet->user->name }}</div>
                                <p class="text-black hover:text-lime-50 hover:text-xl text-base">
                                    {{ $tweet->text }}
                                </p>
                                @if($tweet->img)
                                    <img src="{{ asset('storage/' . $tweet->img) }}" alt="{{ $tweet->text }}" class="mb-4">
                                @endif
                                <p>{{ $tweet->created_at->diffForHumans() }}</p>
                                <p>{{ $tweet->likes_count }} Likes </p>
                            </div>
                        </div>
                    </a>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
