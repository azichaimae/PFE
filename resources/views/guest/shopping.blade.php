@extends('layouts.dashboard.guest.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark" style="font-family: 'Montserrat', sans-serif;">
        Shopping Cart
    </h3>
    <br>
    <div class="bg-white shadow-lg rounded-lg overflow-hidden" style="font-family: 'Montserrat', sans-serif;">
        <div class="p-4">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Image</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantity</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Remove</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200" style="font-family: 'Montserrat', sans-serif;">
                    @foreach ($cart as $c)
                        <tr class="items-center justify-between py-4 text-center">
                            <td class="px-6 py-4 whitespace-nowrap flex justify-center">
                                <img class="h-20 w-20 rounded-full" src="{{ asset('products/' . $c->image) }}" alt="">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-800">{{ $c->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-gray-600">${{ $c->price }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-800">{{ $c->count }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between px-4 py-2 bg-gray-200" style="font-family: 'Montserrat', sans-serif;">
            <div class="text-gray-600">Total: $87.98</div>
            <button class="bg-success-600 text-white px-4 py-2 rounded hover:bg-success-700"><a href="{{ route('login') }}">Checkout</a></button>
        </div>
    </div>
@endsection
