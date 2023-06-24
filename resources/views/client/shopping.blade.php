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
    @extends('layouts.dashboard.client.dashboard')
    <br>
    <br>
    <br>
    @section('content')
        <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-dark">
            Shopping page
        </h3>
        <br>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden" style="font-family: 'Montserrat', sans-serif; ">
            <div class="p-4">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Image</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantity</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price*qte</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Remove</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200" style="font-family: 'Montserrat', sans-serif; ">
                        @foreach ($cart as $c)
                            <tr class="items-center justify-between py-4 text-center">
                                <td class="px-6 py-4 whitespace-nowrap flex justify-center">
                                    <img class="h-20 w-20 rounded-full" src="{{asset('products/'.$c->image)}}" alt="{{ $c->name }}">
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
                                    <div class="text-gray-600">${{$c->qte * $c->price}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Remove</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex items-center justify-between px-4 py-2 bg-gray-200" style="font-family: 'Montserrat', sans-serif; ">
                <div class="text-gray-600">Total: ${{$total}}</div>
                <a href="{{route('client.product.confirm')}}">
                        <button class="bg-success-600 text-white px-4 py-2 rounded hover:bg-success-600">
                            confirmer
                        </button>
                    </a>
            </div>
        </div>
        <br>
        <br>
        <div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-600"><a href="{{route('client.product.history')}}" style="color:white; ">History</a></button>
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

