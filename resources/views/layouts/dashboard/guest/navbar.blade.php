<nav class="flex-no-wrap relative flex w-full items-center justify-between bg-neutral-50 py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4" style="font-family: 'Montserrat', sans-serif; font-wight:bold;"
    data-te-navbar-ref>
    <div class="flex w-full flex-wrap items-center justify-between px-3">
        <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
            id="navbarSupportedContent1" data-te-collapse-item>
            <div>
                <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row" data-te-navbar-nav-ref>
                    <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <!-- Dashboard link -->
                        <a class="text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="{{ url('/') }}" data-te-nav-link-ref>Home</a>
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
                <form action="{{ route('guest.product.search') }}"
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
            <form class="" action="{{ route('guest.product.filter') }}">
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
                href="{{ route('guest.product.shopping') }}">
                <span class="[&>svg]:w-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path
                            d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                    </svg>
                </span>
            </a>
            <!-- Second dropdown container -->
            <div class="relative" data-te-dropdown-ref>
                <a href="{{ route('login') }}"
                    class="mr-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    login
                </a>
            </div>
        </div>
    </div>
</nav>
