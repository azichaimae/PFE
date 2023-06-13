@extends('layouts.dashboard.admin.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark" style="font-family: 'Montserrat', sans-serif; font-weight:bold">
        Users Management
    </h3>
    <br>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400"style="font-family: 'Montserrat', sans-serif;">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        {{-- actions --}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $d->name }}
                        </th>
                        <th scope="row"
                            class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $d->email }}
                            {{-- {{ $d->count }} --}}
                        </th>
                        <th scope="row"
                            class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{-- {{ $d->count }} --}}
                            {{ $d->is_admin ? 'admin' : 'client' }}
                            {{-- {{ $d->is_admin }} --}}
                        </th>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.users.edit', $d->id) }}"
                                class="focus:outline-none text-white bg-success-600 hover:bg-success-500 focus:ring-4 focus:ring-success-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-success-900">
                                Edit user
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
