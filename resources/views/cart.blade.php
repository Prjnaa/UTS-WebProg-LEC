<x-app-layout>
<x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight">Cart</h2>
    </x-slot>
        @if (count($cartItems) > 0)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg container sm:w-2/3 mx-auto mt-5">
                <table class="w-full text-xl text-left text-gray-500">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50">
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
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $item['item_name'] }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ 'Rp. ' . number_format($item['item_price']) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item['qty'] }}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('cart.delete', $item['cartItem']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 underline-offset-1 hover:underline hover:underline-offset-2 duration-100">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-white border-b">
                            <th scope="row" colspan="5"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Total Price: {{ 'Rp. ' . number_format($totalPrice) }}
                            </th>
                        </tr>
                    </tfoot>
                </table>
        </div @else <p class=" text-center m-10 text-3xl">Your cart is empty</p>
    </div>
        @endif
</x-app-layout>
