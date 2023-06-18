@extends('layouts.dashboard.client.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark" style="font-family: 'Montserrat', sans-serif; ">
        Create new recipe
    </h3>
    <br>
    <form action="{{ route('client.recipes.store') }}" method="POST" enctype="multipart/form-data" class="my-6" style="font-size: 20px">
        @csrf
        <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-blue-700">Title</label>
            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="title" name="name" required>
        </div>
        <div class="mb-6">
            <label for="content" class="block mb-2 text-sm font-medium text-blue-700">Content</label>
            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="content" name="description" rows="5" required></textarea>
        </div>
        <div class="mb-6">
            <label for="image" class="block mb-2 text-sm font-medium text-blue-700">Image</label>
            <input type="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="image" name="picture">
        </div>
        <button type="submit"  class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
    </form>
@endsection



