<x-guest-layout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('profile.show', $tweet->user) }}">Tweet de {{ $tweet->user->name }} </a>
        </h2>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white/10">
                <p class="text-black/90 text-lg">{{ $tweet->text }}</p>
                @if($tweet->img)
                    <img src="{{ asset('storage/' . $tweet->img) }}" alt="{{ $tweet->text }}" class="mb-4">
                @endif
                <form action="{{ route('tweets.like', $tweet->id) }}" method="POST">
                    @csrf
                    <p>{{ $tweet->likes_count }} Likes </p><button class="text-red-600 text-xl mt-4" type="submit"><x-heroicon-o-heart class="w-6 h-6 text-black" /></button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
