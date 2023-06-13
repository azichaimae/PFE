@extends('layouts.dashboard.admin.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark" style="font-family: 'Montserrat', sans-serif; font-weight:bold">
        Products Management
    </h3>

    <form class="my-6" action="{{ route('admin.products.store') }}" method="Post" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-blue-700">Product's Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Name">
        </div>
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-blue-700">Product's Image</label>
            <input type="file" name="image"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <div class="mb-6">

            <label for="message" class="block mb-2 text-sm font-medium text-blue-700">Description</label>
            <textarea id="message" rows="4" name="description"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="description...">{{ old('name') }}</textarea>

        </div>
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-blue-700">Price</label>
            <input type="number" name="price" step=0.01 min="0.01" value="{{ old('price') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="price...">
        </div>
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-blue-700">Quantity</label>
            <input name="quantity" type="number" step=1 min="0" value="{{ old('quantity') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="quantity...">
        </div>
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-blue-700">Product's Category</label>
            <select name="category" id=""
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">--select category--</option>
                @foreach ($data as $d)
                    <option value="{{ $d->id }}" {{ old('category') == $d->id ? 'selected' : '' }}>
                        {{ $d->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit"
            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Add Product
        </button>
    </form>
@endsection
