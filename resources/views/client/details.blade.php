@extends('layouts.dashboard.client.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark" style="font-family: 'Montserrat', sans-serif; font-weight:bold">
        Commande Details
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
                            Price*qte</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200"style="font-family: 'Montserrat', sans-serif;">
                    @foreach ($cart as $c)
                        <tr class="items-center justify-between py-4 text-center">
                            <td class="px-6 py-4 whitespace-nowrap flex justify-center">
                                <img class="h-20 w-20 rounded-full" src="{{ asset('products/' . $c->image) }}"
                                    alt="">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-800">{{ $c->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-gray-600">${{ $c->price }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-800">{{ $c->qte }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-gray-600">${{ $c->qte * $c->price }}</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between px-4 py-2 bg-gray-200">
            <div class="text-gray-600">Total: ${{ $total }}</div>
        </div>
        <div class="flex items-center justify-between px-4 py-2 bg-gray-200">
            <div class="text-gray-600">Status: {{ $cart[0]->status_name }}</div>
        </div>
    </div>
@endsection


@section('categories')
    @foreach ($cat as $c)
        <a href="{{ route('client.product.category', $c->id) }}" aria-current="true" style="font-family: 'Montserrat', sans-serif;"
            class="block w-full border-b border-neutral-200 px-6 py-2 transition duration-150 ease-in-out hover:bg-neutral-50 hover:text-neutral-700 dark:border-neutral-500 dark:hover:bg-neutral-800 dark:hover:text-white">
            {{ $c->name }} ({{ $c->count }})
        </a>
    @endforeach
@endsection
