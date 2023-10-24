<x-app-layout>
    <div class="relative bg-cover bg-center w-2/3 container mx-auto rounded-lg p-5 m-5" style="background-image: url('../storage/images/bg.jpg'); height: 200px;">
        <div class="absolute inset-0 bg-black opacity-40 rounded-lg"></div>
        <div class="absolute inset-0 flex flex-col md:pl-20 pr-4 md:pr-32 items-left justify-center w-full md:w-4/4 mx-auto">
            <div class="custom-font text-white text-4xl md:text-6xl font-semibold text-left ">
                Cart
            </div>
        </div>
    </div>


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
        </div>
        <div class="container mx-auto sm:w-2/3 mt-5">
            <div class="text-left">
                <a href="" class="bg-black text-white px-4 py-2 rounded-lg hover:bg-black-500 transition duration-300">
                    Proceed to Checkout
                </a>
            </div>
        </div>

        @else <p class=" text-center m-10 text-3xl">Your cart is empty</p>
    </div>
        @endif

        
</x-app-layout>
