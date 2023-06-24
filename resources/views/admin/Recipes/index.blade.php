@extends('layouts.dashboard.admin.dashboard')

@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark" style="font-family: 'Montserrat', sans-serif; font-weight:bold">
        Recipes CRUD
    </h3>
    @if ($message = Session::get('success'))
        <div class="mb-4 rounded-lg bg-success-100 px-6 py-5 text-base text-success-700" role="alert" style="font-family: 'Montserrat', sans-serif; font-weight:bold">
            {{ $message }}
        </div>
    @endif
    @if ($message = Session::get('danger'))
        <div class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-700" role="alert" style="font-family: 'Montserrat', sans-serif; font-weight:bold">
            {{ $message }}
        </div>
    @endif
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr style="font-family: 'Montserrat', sans-serif; font-weight:bold">
                    <th scope="col" class="px-6 py-3">Recipe</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Image</th>
                    <th scope="col" class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recipes as $recipe)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" style="font-family: 'Montserrat', sans-serif;">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $recipe->name }}
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                            {{ $recipe->description }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('recipes/'.$recipe->picture) }}" alt="{{ $recipe->name }}" class="w-20 h-20 rounded-lg">
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.recipes.edit', $recipe->id) }}"
                                class="focus:outline-none text-white bg-success-600 hover:bg-success-400 focus:ring-4 focus:ring-success-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Edit</a>
                            <br><br><br>
                        <form action="{{ route('client.recipes.destroy', $recipe->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                                <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

