<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-fyvp7b4pQaeV0i0q7hD4I7B+M8gul/DXnM7zGzJs2iKwMr8YYtyY2qH4aU0j4Mjk9JxjNYO/Kg9yJYwomX7e/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
</head>
<body>
    @include('partials.style')
    @extends('layouts.dashboard.client.dashboard')
    <br>
    <br>
    <br>
    @section('content')
    <br>
        <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark">
            All products
        </h3>
        <br>
        <div class="flex w-full flex-wrap items-center justify-between px-3">
            <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
                id="navbarSupportedContent1" data-te-collapse-item>
                <div>
                    <ul class="mr-auto flex flex-row" data-te-navbar-nav-ref>
                        <li class="static" data-te-nav-item-ref data-te-dropdown-ref>
                            <a class="flex items-center whitespace-nowrap py-2 pr-2  transition duration-150 ease-in-out hover:text-neutral-700 focus:text-neutral-700 dark:hover:text-white dark:focus:text-white lg:px-2"
                                href="#" data-te-ripple-init data-te-ripple-color="light" type="button"
                                id="dropdownMenuButtonX" data-te-dropdown-toggle-ref aria-expanded="false"
                                data-te-nav-link-ref> <strong>Categories</strong>
                                <span class="ml-2 w-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="h-5 w-5">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </a>
                            <div class="absolute left-0 right-0 top-full z-[1000] mt-0 hidden w-full border-none bg-white bg-clip-padding text-neutral-600 shadow-lg dark:bg-neutral-700 dark:text-neutral-200 [&[data-te-dropdown-show]]:block"
                                aria-labelledby="dropdownMenuButtonX" data-te-dropdown-menu-ref>
                                <div class="px-6 py-5 lg:px-8">
                                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                                        <div>
                                            @foreach ($cat as $c)
                                            <a href="{{ route('client.product.category', $c->id) }}" aria-current="true" style="font-family: 'Montserrat', sans-serif; "
                                                class="block w-full border-b border-neutral-200 px-6 py-2 transition duration-150 ease-in-out hover:bg-neutral-50 hover:text-neutral-700 dark:border-neutral-500 dark:hover:bg-neutral-800 dark:hover:text-white">
                                                {{ $c->name }} ({{$c->count}})
                                            </a>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mx-8">
                    <form action="{{ route('client.product.search') }}"
                        class="relative flex w-full flex-wrap items-stretch">
                        <input type="search" name="search"
                            class="relative w-72 m-0 -mr-0.5 block min-w-0 flex-auto rounded-l border border-solid border-green-500 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-green-500 focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            placeholder="Search" aria-label="Search" aria-describedby="button-addon3" />
                        <button type="submit"
                            class="relative z-[2] rounded-r border-2 border-green-500 bg-green-500 text-xs font-medium uppercase text-black transition duration-150 ease-in-out hover:bg-green-600 focus:outline-none focus:border-green-500 focus:ring-green-500 px-9 py-2"
                            type="button" id="button-addon3" data-te-ripple-init>
                            Search
                        </button>
                    </form>
                </div>
                <form class="" action="{{ route('client.product.filter') }}">
                    <input type="number" id="min-price" name="min-price" class="border rounded-lg py-1 px-2 w-20" min="0"
                        step="0.01" placeholder="Min">

                    <input type="number" id="max-price" name="max-price" class="border rounded-lg py-1 px-2 w-20" min="0"
                        step="0.01" placeholder="Max">

                    <button type="submit"
                        class="bg-green-600 text-white rounded-lg py-1 px-4 hover:bg-green-800">Filter</button>
                </form>
            </div>
        </div>
        <br>
        <br>
        <div class="mt-6 flex flex-wrap justify-around gap-4">
            @foreach ($dd as $d)
                <div class="max-w-sm rounded overflow-hidden shadow-lg w-96">
                    <a href="{{ route('client.product.show', $d->id) }}">
                        <div style="background-image: url('{{asset('products/'.$d->image)}}');"
                            class="bg-hero bg-no-repeat bg-cover bg-center  w-full h-64">
                        </div>
                    </a>
                    <div class="px-5 pb-5">
                        <h5 class="py-4 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ $d->name }}
                        </h5>
                        <span
                            class=" inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $d->category }}</span>
                        <div class="my-5 flex items-center justify-between">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ $d->price }}</span>
                            <div>
                                <a href="{{ route('client.product.cart', $d->id) }}"
                                    class="mr-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
    @section('categories')
        @foreach ($cat as $c)
            <a href="{{ route('client.product.category', $c->id) }}" aria-current="true" style="font-family: 'Montserrat', sans-serif; "
                class="block w-full border-b border-neutral-200 px-6 py-2 transition duration-150 ease-in-out hover:bg-neutral-50 hover:text-neutral-700 dark:border-neutral-500 dark:hover:bg-neutral-800 dark:hover:text-white">
                {{ $c->name }} ({{$c->count}})
            </a>
        @endforeach
    @endsection
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
