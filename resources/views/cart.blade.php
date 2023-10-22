<x-app-layout>
    <x-slot name="header">
        Cart
    </x-slot>
    <div class="">
        @if (count($cartItems) > 0)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg container sm:w-2/3 mx-auto mt-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Menu Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item['item_name'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ 'Rp. ' . number_format($item['item_price']) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['qty'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div
        @else
            <p class=" text-center m-10 text-xl">Your cart is empty</p>
        @endif
    </div>
</x-app-layout>
