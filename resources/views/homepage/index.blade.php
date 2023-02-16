<x-guest-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
          @foreach ($tweets as $tweet)
          <div class="rounded overflow-hidden shadow-lg transform transition duration-300 hover:scale-105">
            <div class="px-6 py-4">
              <div class="text-gray-500 text-sm mb-2">{{ $tweet->user->name }}</div>
              <p class="text-black text-base">
                {{ $tweet->text }}
              </p>
            </div>
          </div>
          @endforeach
        </div>
      </div>



    <div class="mt-8">
        {{ $tweets->links() }}
    </div>
</x-guest-layout>


