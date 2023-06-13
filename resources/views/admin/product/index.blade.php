@extends('layouts.dashboard.admin.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark " style="font-family: 'Montserrat', sans-serif; font-weight:bold">
        Products page
    </h3>
    <br>
    <div style="font-family: 'Montserrat', sans-serif;">
        <a href="{{ route('admin.products.create') }}"
            class="mr-4 text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="font-family: 'Montserrat', sans-serif; ">
            Add new product
        </a>
        <a href="{{ route('product.export') }}"
            class="mr-4 text-white bg-purple-600 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
            Export products
        </a>
        <form class="my-6" action="{{ route('product.import') }}" method="POST" enctype="multipart/form-data" style="font-family: 'Montserrat', sans-serif;">
            @csrf
            <input type="file" name="file"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            <button
                class="my-2 text-white bg-pink-600 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800">
                Upload products
            </button>
        </form>

    </div>
    @if ($message = Session::get('success'))
        <div class="mb-4 mt-6 rounded-lg bg-success-100 px-6 py-5 text-base text-success-700" role="alert">
            {{ $message }}
        </div>
    @endif
    <div class="mt-6 flex flex-wrap justify-around gap-4"  style="font-family: 'Montserrat', sans-serif; font-weight:bold">
        @foreach ($dd as $d)
            <div class="max-w-sm rounded overflow-hidden shadow-lg w-96">
                <div style="background-image: url('{{asset('products/'.$d->image)}}');"
                    class="bg-hero bg-no-repeat bg-cover bg-center  w-full h-64">
                </div>
                {{-- <img src="{{asset('products/'.$d->image)}}" alt="{{ $d->name }}"> --}}
                <div class="px-5 pb-5">
                    <h5 class="py-4 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                        {{ $d->name }}
                    </h5>
                    <span
                        class=" inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $d->category }}</span>
                    <div class="my-5 flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ $d->price }}</span>
                        <div>
                            <a href="{{ route('admin.products.edit', $d->id) }}"
                                class="focus:outline-none text-white bg-success-600 hover:bg-success-800 focus:ring-4 focus:ring-success-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-success-900">Edit</a>

                            <a href="{{ route('admin.products.delete', $d->id) }}"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>

    </div>
@endsection
