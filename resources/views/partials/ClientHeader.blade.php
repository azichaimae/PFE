<header>
    <div class="navbar">
        <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
            id="navbarSupportedContent1" data-te-collapse-item>
            <img src="{{ asset('images/planet.jpg') }}" alt="WTW logo" style="width: 250px;">
        </div>
        <div >
            <a href="{{url('/')}}" class="spc">Home</a>
            <a href="{{ route('guest.product.index') }}" class="spc">Store</a>
            <a href="" class="spc">Recepies</a>
            <a href="" class="spc">About Us</a>
            <a href="" class="spc">Contact Us</a>
            <a href="{{ route('login') }}" class="spc">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
        </div>
    </div>
    <br>
</header>
