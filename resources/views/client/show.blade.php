@extends('layouts.dashboard.client.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark" style="font-family: 'Montserrat', sans-serif; font-weight:bold">
        Product Details
    </h3>
    <br>
    <div class="container mt-5 font-family-montserrat">
        <div class="flex flex-wrap">
            <div style="background-image: url('{{ asset('products/'.$data->image) }}'); "
                class="bg-hero bg-no-repeat bg-cover bg-center w-1/2 h-96">
            </div>
            <div class="flex flex-col justify-center col-span-6" style="padding-left: 60px; font-family: 'Montserrat', sans-serif;">
                <h1 class="text-3xl font-semibold mb-3">Product Name</h1>
                <p class="text-lg font-medium mb-4">$42.99</p>
                <p class="text-base mb-4">Product details</p>
                <a class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded"
                href="{{ route('client.product.cart', $data->id) }}">Add to Cart</a>
            </div>
        </div>
    </div>

@endsection

@section('categories')
    @foreach ($cat as $c)
        <a href="{{ route('client.product.category', $c->id) }}" aria-current="true"
            class="block w-full border-b border-neutral-200 px-6 py-2 transition duration-150 ease-in-out hover:bg-neutral-50 hover:text-neutral-700 dark:border-neutral-500 dark:hover:bg-neutral-800 dark:hover:text-white">
            {{ $c->name }} ({{$c->count}})
        </a>
    @endforeach
@endsection
