<x-app-layout class="">
    <div class="grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-3 lg:px-16 xl:grid-cols-4 2xl:grid-cols-5 2xl:px-24 md:gap-8 w-screen px-5 pt-10 justify-items-center">
        @foreach ($menus as $menu)
            <div class="bg-white rounded-lg shadow-lg w-full object-cover aspect-square lg:flex lg:h-40 lg:w-80 relative">
                <img src="storage/{{ $menu->menu_img_path }}" alt="" class="rounded-t-lg h-32 sm:h-40 w-full lg:w-36 lg:h-full lg:rounded-l-lg object-cover">
                <div class="p-2">
                    <div>
                        <h2 class="font-bold text-lg text-slate-800 leading-3 pt-2">{{ $menu->menu_name }}</h2>
                        <span class=" text-xs leading-3 text-gray-500">#{{ $menu->menu_cat }}</span>
                        <div id="price" class="font-semibold mb-1 text-slate-800">{{ 'Rp.' . ' ' .  number_format($menu->price) }}</div>
                        <p class="flex leading-3 text-xs font-light text-gray-500 absolute">{{ Str::limit($menu->menu_desc, 75, '...' ) }} </p>
                    </div>
                    <form action="{{ route('addToCart', ['menu' => $menu->id]) }}" method="POST" class=" mt-12 pt-1">
                        @csrf
                        <button type="submit" class=" text-xs text-slate-800 hover:underline hover:scale-105 transition">+ Add to Cart</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
