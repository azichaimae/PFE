<!DOCTYPE html>
<head>
    @include('partials.style')
    <title>Wasted to Wanted - client</title>
</head>
<body>
    {{-- header --}}
    <header>
        <div class="navbar">
            <img src="{{ asset('images/planetLOGO.png') }}" alt="WTW logo" style="width: 250px;">

            <div>
                <a href="{{url('/')}}" class="spc">Home</a>
                <a href="{{ route('guest.product.index') }}" class="spc">Store</a>
                <a href="" class="spc">Recepies</a>
                <a href="" class="spc">About Us</a>
                <a href="" class="spc">Contact Us</a>
                <a href="#" style="display: inline-block; margin-right: 10px;">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="padding_10">Cart</span></a>
                {{-- <p style="display: inline-block; margin-left: 10px; margin-right: 10px;">  {{ Auth::user()->name }}</p> --}}
                <form method="POST" action="{{ route('logout') }}" style='display: inline-block; margin-left: 10px; cursor: pointer;'>
                    @csrf
                    <p :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" >
                        {{ __('Log Out') }}
                    </p>
                </form>
            </div>
        </div>
    </header>

    {{-- home content --}}
    @include('partials.ClientHome')

    <!-- Footer -->
    @include('partials.ClientFooter')

    <script src="{{asset('script.js')}}"></script>
</body>

