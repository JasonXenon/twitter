<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Tweet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('tweets.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="text" :value="__('Tweet text')" />
                            <x-text-input id="text" class="block mt-1 w-full" type="text" name="text" required autofocus />
                            <x-input-error :messages="$errors->get('text')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="img" :value="__('Image')" />
                            <x-text-input id="img" class="block mt-1 w-full" type="file" name="img" />
                            <x-input-error :messages="$errors->get('img')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Create Tweet') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
