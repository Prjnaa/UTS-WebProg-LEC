<x-app-layout>
    <div class="">
        <x-slot name="header">
            <h1>Your Cart</h1>
        </x-slot>
        @if (count($cartItems) > 0)
            @foreach ($cartItems as $item)
                <div>
                    <h2>Item Name: {{ $item['item_name'] }}</h2>
                    <p>Category: {{ $item['item_cat'] }}</p>
                    <p>Price: {{ $item['item_price'] }}</p>
                    <p>Quantity: {{ $item['qty'] }}</p>
                    <img src="storage/{{($item['item_img']) }}" alt="{{ $item['item_name'] }}" width="100" height="100">
                </div>
            @endforeach
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
</x-app-layout>
