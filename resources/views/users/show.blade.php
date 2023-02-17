<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium mb-2">{{ $user->name }}</h3>
                    <p class="text-gray-500 mb-4">{{ $user->email }}</p>

                    <h4 class="text-lg font-medium mb-2">Tweets</h4>
                    @if ($tweets->isEmpty())
                        <p class="text-gray-500">Aucun tweet.</p>
                    @else
                        <ul class="list-disc list-inside">
                            @foreach ($tweets as $tweet)
                                <li>{{ $tweet->text }}</li>
                            @endforeach
                        </ul>
                        <div class="mt-4">{{ $tweets->links() }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
