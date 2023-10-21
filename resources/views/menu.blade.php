<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-300 dark:bg-gray-900">
        <section class=" sticky top-0 z-10">
            @include('layouts.navigation')
        </section>
        <header class="text-center">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-xl text-white font font-semibold">
                Menu
            </div>
        </header>
        <div class="dark:text-gray-100 grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-3 lg:px-16 xl:grid-cols-4 2xl:grid-cols-5 2xl:px-24 md:gap-8 w-screen px-5 pt-10 justify-items-center">
            @foreach ($menus as $menu)
                <div class="bg-white rounded-lg shadow-lg w-full object-cover aspect-square lg:flex lg:h-40 lg:w-80 relative ">
                    <img src="storage/{{ $menu->menu_img_path }}" alt="" class="rounded-t-lg h-32 sm:h-40 w-full lg:w-36 lg:h-full lg:rounded-l-lg object-cover">
                    <div class="p-2">
                        <div>
                            <h2 class="font-bold text-lg text-slate-800 leading-3 pt-2">{{ $menu->menu_name }}</h2>
                            <span class=" text-xs leading-3 text-gray-500">#{{ $menu->menu_cat }}</span>
                            <div id="price" class="font-semibold mb-1 text-slate-800">{{ 'Rp.' . ' ' .  number_format($menu->price) }}</div>
                            <p class="flex leading-3 text-xs font-light text-gray-500 absolute">{{ Str::limit($menu->menu_desc, 75, '...' ) }} </p>
                        </div>
                        @if (Auth::check())
                            <form action="{{ route('addToCart', ['menu' => $menu->id]) }}" method="POST" class=" mt-12 pt-1">
                                @csrf
                                <button type="submit" class=" text-xs text-slate-800 hover:underline hover:scale-105 transition">+ Add to Cart</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</html>
