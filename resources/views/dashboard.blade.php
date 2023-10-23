<x-app-layout>
    <x-slot name="header">
        <div class="text-xl text-black-700 uppercase">
        Dashboard
        </div>
    </x-slot>
    <div class="text-center">
        <form method="get" action="{{ route('menu.create') }}">
            <x-primary-button>
                + Add New Item
            </x-primary-button>
        </form>
    </div>
    @if (count($menus) > 0)
        <div class="relative overflow-x-auto overflow-y-auto shadow-md sm:rounded-lg container mx-auto mt-10">
            <table class="w-full text-xl text-left text-gray-800">
                <thead class="text-base text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3 nowr">
                            Menu Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        <tr class="bg-white border-b">
                            <td class="font-medium text-gray-900">
                                <img src="storage/{{ $menu->menu_img_path }}" alt="menu_img" class="h-40 w-28 object-cover">
                            </td>
                            <td class="px-6 py-4">
                                <p>{{ $menu->menu_name }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p>{{ $menu->menu_cat }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="h-36 w-72 overflow-auto remove-scroll">{{ $menu->menu_desc }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p>{{ $menu->price }}</p>
                            </td>
                            <td class="px-6 py-4 flex">
                                <!-- Edit button -->
                                <button type="button"
                                    class="bg-blue-700 hover:scale-105 hover:bg-blue-950 px-3 py-1 ml-3 rounded-md text-white transition duration-200"
                                    onclick="toggleEdit({{ $menu->id }})">Edit</button>
                                <!-- Delete button -->
                                <form method="POST" action="{{ route('menu.destroy', $menu->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-700 hover:scale-105 hover:bg-red-950 px-2 py-1 ml-3 rounded-md text-white transition duration-200">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr id="edit-row-{{ $menu->id }}" style="display: none;" class=" bg-gray-200">
                            <td colspan="6" class="px-5 py-4">
                                <div class="text-center text-xl font-semibold text-gray-700">
                                    Edit
                                </div>
                                <form method="post" action="{{ route('menu.update', $menu->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex flex-col space-y-2">
                                        <x-input-label>Menu Name</x-input-label>
                                        <x-text-input type="text" name="menu_name" value="{{ $menu->menu_name }}"
                                            class="form-input block mt-1 w-full h-8" />
                                        <x-input-label>Category</x-input-label>
                                        <x-text-input type="text" name="menu_cat" value="{{ $menu->menu_cat }}"
                                            class="form-input block mt-1 w-full h-8" />
                                        <x-input-label>Description</x-input-label>
                                        <textarea name="menu_desc" class="w-full h-40 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 resize-none">{{ $menu->menu_desc }}</textarea>
                                        <x-input-label>Price</x-input-label>
                                        <x-text-input type="text" name="price" value="{{ $menu->price }}"
                                            class="w-full" />
                                    </div>
                                    <div class="flex mt-5">
                                        <button type="submit"
                                            class="bg-green-700 hover:scale-105 hover:bg-green-950 px-2 py-1  rounded-md text-white transition duration-200">Save</button>
                                        <button type="button"
                                            class="bg-red-700 hover:scale-105 hover:bg-red-950 px-2 py-1 ml-3 rounded-md text-white transition duration-200"
                                            onclick="cancelEdit({{ $menu->id }})">Cancel</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center m-10 text-xl">No Food Listed</p>
    @endif
</x-app-layout>

<script>
    function toggleEdit(menuId) {
        // Hide the row with menu details
        document.getElementById(`edit-row-${menuId}`).style.display = "table-row";
    }

    function cancelEdit(menuId) {
        // Hide the edit form and show the row with menu details
        document.getElementById(`edit-row-${menuId}`).style.display = "none";
    }
</script>
