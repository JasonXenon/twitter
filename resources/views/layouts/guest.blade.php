<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

        <header>
            <nav
                class="flex justify-between items-center py-2 bg-white shadow-md px-2 rounded-md">
                <div>
                    <a href="{{ url('/') }}"
                        class="group font-bold text-3xl flex items-center space-x-4 hover:text-blue-500 transition ">
                        Twitter de Jason
                    </a>
                </div>
                <div class="flex items-center space-x-4 justify-end">
                    <a class="font-bold hover:text-blue-500 text-xl transition mr-2"
                        href="{{ route('profile.edit') }}">Profil</a>
                </div>
                <div class="flex items-center space-x-4 justify-end">
                    <a class="font-bold hover:text-blue-500 text-xl transition mr-2"
                        href="{{ route('tweets.create') }}">Créer un tweet</a>
                </div>
            </nav>
        </header>


        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full h-full my-6 p-6 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
