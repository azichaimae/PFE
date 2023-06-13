@extends('layouts.dashboard.admin.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark" style="font-family: 'Montserrat', sans-serif; font-weight:bold">
        Category's CRUD
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
    <form class="my-6" action="{{ route('admin.categories.store') }}" method="Post">
        @csrf
        <div class="mb-6">
            {{-- <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label> --}}
            <input type="text" name="name" style="font-family: 'Montserrat', sans-serif; font-weight:bold"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Add your Category . . . " required>
        </div>
        <button type="submit" style="font-family: 'Montserrat', sans-serif; font-weight:bold"
            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
            Category</button>
    </form>

    {{-- {{$data}} --}}
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr style="font-family: 'Montserrat', sans-serif; font-weight:bold">
                    <th scope="col" class="px-6 py-3">Category</th>
                    <th scope="col" class="px-6 py-3 text-center">Count</th>
                    <th scope="col" class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" style="font-family: 'Montserrat', sans-serif;">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $d->name }}
                        </th>
                        <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $d->count }}
                        </th>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.categories.edit', $d->id) }}"
                                class="focus:outline-none text-white bg-success-600 hover:bg-success-400 focus:ring-4 focus:ring-success-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Edit</a>

                            <a href="{{ route('admin.categories.delete', $d->id) }}"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2  ">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
