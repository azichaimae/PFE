<nav class="flex-no-wrap relative flex w-full items-center justify-between bg-neutral-50 py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4" style="font-family: 'Montserrat', sans-serif; font-wight:bold;"
    data-te-navbar-ref>
    {{-- <div class="flex w-full flex-wrap items-center justify-between px-3">
        <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
            id="navbarSupportedContent1" data-te-collapse-item>
            <div>
                <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row" data-te-navbar-nav-ref>
                    <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <!-- Dashboard link -->
                        <a class="text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="{{ url('/client/home') }}" data-te-nav-link-ref>Home</a>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="mr-auto flex flex-row" data-te-navbar-nav-ref>
                    <li class="static" data-te-nav-item-ref data-te-dropdown-ref>
                        <a class="flex items-center whitespace-nowrap py-2 pr-2  transition duration-150 ease-in-out hover:text-neutral-700 focus:text-neutral-700 dark:hover:text-white dark:focus:text-white lg:px-2"
                            href="#" data-te-ripple-init data-te-ripple-color="light" type="button"
                            id="dropdownMenuButtonX" data-te-dropdown-toggle-ref aria-expanded="false"
                            data-te-nav-link-ref>categories
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
                                        @yield('categories')
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
                        class="relative w-72 m-0 -mr-0.5 block min-w-0 flex-auto rounded-l border border-solid border-teal-500 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-teal-500 focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                        placeholder="Search" aria-label="Search" aria-describedby="button-addon3" />

                    <button type="submit"
                        class="relative z-[2] rounded-r border-2 border-teal-500 bg-teal-500 text-xs font-medium uppercase text-white transition duration-150 ease-in-out hover:bg-teal-600 focus:outline-none focus:border-teal-500 focus:ring-teal-500 px-9 py-2"
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
                    class="bg-teal-600 text-white rounded-lg py-1 px-4 hover:bg-teal-800">Filter</button>
            </form>
        </div>

        <!-- Right elements -->
        <div class="relative flex items-center">
            <!-- Cart Icon -->
            <a class="mr-4 text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                href="{{ route('client.product.shopping') }}">
                <span class="[&>svg]:w-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path
                            d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                    </svg>
                </span>
            </a>
            <form method="POST" action="{{ route('logout') }}" style="font-family: 'Montserrat', sans-serif; font-wight:bold; background-color:rgba(181, 2, 2, 0.913);color:white; border-radius:5px">
                @csrf
                <button class="{{ Route::is('logout') ? 'shadow-lg shadow-teal-500/50 flex h-12 cursor-pointer items-center truncate rounded-[5px] px-4 py-1 text-[0.875rem] text-white outline-none transition duration-300 ease-linear bg-teal-600 hover:bg-teal-800' : 'flex h-12 cursor-pointer items-center truncate rounded-[5px] px-4 py-1 text-[0.875rem] text-white-600 outline-none transition duration-300 ease-linear hover:bg-teal-600' }}"
                    data-te-sidenav-link-ref href="{{ route('logout') }}">
                    <span>Logout</span>
                </button>
            </form>

        </div>
    </div> --}}
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Wasted to wanted - Products</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Favicons -->
        <link href="{{asset('favicon.ico')}}" rel="icon">
        <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- Template Main CSS File -->
        <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
          <style>
              .post {
              border: 1px solid #ccc;
              padding: 10px;
              margin: 0 auto 10px;
              max-width: 500px;
              text-align: center;
              }

              .post img {
              display: block;
              margin: 0 auto;
              max-width: 200px;
              height: auto;
              }

              .post-content {
              margin-top: 10px;
              }

              .post-content h2 {
              font-size: 20px;
              margin: 0;
              }

              .post-content p {
              margin: 5px 0;
              }

              .post-details {
              margin-top: 10px;
              }

              .post-details div {
              display: inline-block;
              margin-right: 10px;
              }

              .heart-icon::before {
              content: "\2665";
              }

              .comment-icon::before {
              content: "\2709";
              }

              .share-icon::before {
              content: "\f1e0";
              font-family: "FontAwesome";
              }

              .post-icons {
              margin-top: 10px;
              }

              .post-icons i {
              font-size: 18px;
              margin-right: 5px;
              }

              .post-comments {
              margin-top: 10px;
              }

              .comment {
              margin-bottom: 5px;
              }
              .btn {
              display: inline-block;
              padding: 10px 20px;
              margin-left: 460px;
              background-color: green;
              color: white;
              text-decoration: none;
              font-weight: bold;
              border-radius: 5px;
              }
          </style>
    </head>
    <body class="index-page">

        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">
          <div class="container-fluid d-flex align-items-center justify-content-between">

            {{-- <a href="" class="logo d-flex align-items-center me-auto me-xl-0">
              <img src="{{asset('images/planetLOGO.png')}}" alt="" style="width: 250px">
            </a> --}}
            <a href="" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1>Wasted to Wanted</h1>
                <span>.</span>
            </a>

            <!-- Nav Menu -->
            <nav id="navmenu" class="navmenu">
              <ul>
                <li><a href="{{route('client.index')}}" >Home</a></li>
                <li><a href="{{route('client.index')}}">About</a></li>
                <li><a href="{{route('client.index')}}">Services</a></li>
                <li><a href="{{route('client.recipes.index')}}">Recepies</a></li>
                <li><a href="{{ route('guest.product.index') }}" class="active">Store</a></li>
                <li><a href="{{route('client.index')}}">Contact Us</a></li>
                <li><a class="mr-4 text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                  href="{{ route('client.product.shopping') }}">
                  <span class="[&>svg]:w-5">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                          <path
                              d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                      </svg>
                  </span>
              </a></li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav><!-- End Nav Menu -->

            <div class="dropdown has-dropdown">
              <a href="#" class="btn-getstarted dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                      Log Out
                    </a>
                  </form>
                </div>
            </div>

          </div>
    </header>
</nav>
