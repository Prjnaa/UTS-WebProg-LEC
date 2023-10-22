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
    <body class="font-sans antialiased bg-gray-300 ">
        <section class=" sticky top-0 z-10">
            @include('layouts.navigation')
        </section>
        <header class="text-center">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-xl text-white font font-semibold">
                Menu
            </div>
        </header>
        <div class="grid grid-cols-2 gap-5 md:grid-cols-3 md:x-0 lg:grid-cols-2 lg:px-16 xl:grid-cols-4 3xl:grid-cols-5 2xl:px-24 md:gap-8 w-screen px-5 pt-10 justify-items-center">
            @foreach ($menus as $menu)
                <div class="bg-white rounded-lg shadow-lg w-full object-cover aspect-square lg:flex lg:h-40 lg:w-80 relative ">
                    <img src="storage/{{ $menu->menu_img_path }}" alt="" class="rounded-t-lg lg:rounded-l-lg lg:rounded-r-none h-32 sm:h-40 w-full lg:w-40 lg:h-full object-cover">
                    <div class="p-3 flex flex-col lg:h-full justify-between">
                        <div class="lg:flex lg:flex-col lg:justify-center lg:h-full">
                            <h2 class="font-semibold text-xl text-slate-800 leading-6">{{ $menu->menu_name }}</h2>
                            <span class="text-xs text-gray-500 leading-5">#{{ $menu->menu_cat }}</span>
                        </div>
                        <div x-data="{ showModal: (document.cookie.includes('modal=show')) ? true : false }">
                            <!-- Modal Button -->
                            <button @click="showModal = true; document.cookie = 'modal=show'" type="button" class="text-xs text-slate-800 hover:underline hover:scale-105 transition mt-2">
                                Show More...
                            </button>
                            <!-- Modal Background and Content -->
                            <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 py-24 bg-black bg-opacity-60 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 translate-y-1">
                                <div x-show="showModal" class="bg-white rounded-xl md:shadow-2xl mx-5 w-full h-full md:mx-0 md:w-1/2 lg:w-2/5 lg:h-60 md:h-full overflow-hidden" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                    <div class="flex flex-col">
                                        <div class="flex flex-col lg:flex-row relative">
                                            <img src="storage/{{ $menu->menu_img_path }}" alt="menu image" class="w-full lg:w-1/3 h-48 lg:h-64 object-cover">
                                            <div class="lg:w-2/3 p-5 relative">
                                                <h2 class="font-semibold text-xl text-slate-800 leading-6">{{ $menu->menu_name }}</h2>
                                                <span class="text-gray-500 text-sm">#{{ $menu->menu_cat }}</span>
                                                <div id="price" class="font-semibold mb-1 text-slate-800">{{ 'Rp.' . ' ' .  number_format($menu->price) }}</div>
                                                <p class="leading-6 text-gray-500">{{ $menu->menu_desc }}</p>
                                                @if (Auth::check())
                                                    <form action="{{ route('addToCart', ['menu' => $menu->id]) }}" method="POST" class="mt-4">
                                                        @csrf
                                                        <button type="submit" class="text-sm bg-gray-700 text-white rounded-lg py-2 px-4 hover:bg-gray-950 transition absolute bottom-8">Add to Cart</button>
                                                    </form>
                                                @endif
                                            </div>
                                            <button @click="showModal = false; document.cookie = 'modal=hidden'" class="flex items-start absolute right-3 top-3 hover:scale-125 transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</html>
