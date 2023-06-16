@extends('layouts.dashboard.admin.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark" style="font-family: 'Montserrat', sans-serif; font-weight:bold">
        Recipes Management
    </h3>
    <form class="my-6" action="{{ route('admin.recipes.update',$recipe->id) }}" method="Post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-blue-700">Recipes's Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Name">
        </div>
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-blue-700">Recipes's Description</label>
            <input type="textarea" name="description" value="{{ old('description') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Description">
        </div>
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-blue-700">Recipe's Image</label>
            <input type="file" name="picture"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <button type="submit"
            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Add Recipe
        </button>
    </form>
@endsection
