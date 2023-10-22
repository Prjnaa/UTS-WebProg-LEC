<x-app-layout>
    <x-slot name="header">
        Create New Menu
    </x-slot>

    <div class="container mx-auto mt-5 w-full sm:max-w-md px-8 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-input-label for="menu_name" class="block text-gray-700">Menu Name</x-input-label>
                <x-text-input type="text" name="menu_name" id="menu_name" class="form-input block mt-1 w-full h-8" />
            </div>

            <div class="mb-4">
                <x-input-label for="menu_cat" class="block text-gray-700 ">Category</x-input-label>
                <x-text-input type="text" name="menu_cat" id="menu_cat" class="form-input block mt-1 w-full h-8" />
            </div>

            <div class="mb-4">
                <x-input-label for="menu_desc" class="block text-gray-700 ">Description</x-input-label>
                <textarea name="menu_desc" id="menu_desc" rows="4" class="form-textarea block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2 resize-none remove-scroll"></textarea>
            </div>

            <div class="mb-4">
                <x-input-label for="price" class="block text-gray-700 ">Price</x-input-label>
                <x-text-input type="number" name="price" id="price" class="form-input block mt-1 w-full h-8 remove-arrow" />
            </div>

            <div class="mb-4">
                <x-input-label for="menu_image" class="block text-gray-700 ">Image</x-input-label>
                <input type="file" name="menu_image" id="menu_image" class="form-input block mt-2
                file:mr-4 file:py-2 file:px-4
                file:rounded-md file:border-0
                file:text-sm file:font-semibold
                file:white file:gray-800
                hover:file:bg-gray-300
                " />
            </div>

            <div class="mt-6 text-end">
                <x-secondary-button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Menu</x-secondary-button>
            </div>
        </form>
    </div>
</x-app-layout>
