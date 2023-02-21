<x-guest-layout>

    <form method="GET" action="{{ route('search') }}" class="flex items-center justify-end px-3">
        <input type="text" name="query" placeholder="Rechercher des tweets ou des personnes" class="mr-2">
        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Rechercher</button>
    </form>



    <div class="container mx-auto px-4 py-8 ">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($tweets as $tweet)
            <a href="{{ route('tweets.show', ['id' => $tweet->id]) }}">
                <div class=" h-full rounded overflow-hidden shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="h-full px-6 py-4">
                        <div class="text-gray-500 text-sm mb-2">{{ $tweet->user->name }}</div>
                        <p class="text-black text-base">
                            {{ $tweet->text }}
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
        </div>
      </div>


    <div class="mt-8">
        {{ $tweets->links() }}
    </div>
</x-guest-layout>


