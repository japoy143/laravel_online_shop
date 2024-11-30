<!DOCTYPE html>
<html data-theme="light" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rainshop</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class=" font-primary">

    @php
        $user = Auth::user();
    @endphp

    <div class="navbar bg-base-100 flex flex-row justify-between">
        {{-- logo --}}
        <div class="">
            <a class="btn btn-ghost text-xl" href="/">
                <img src="{{ Vite::asset('resources/images/logo.jpg') }}" alt="" class="h-[30px]">
            </a>
        </div>

        {{-- links --}}
        <div class="flex-none font-bold  hidden md:flex">
            <ul class="menu menu-horizontal px-1 text-base">
                <li>
                    <details>
                        <summary>Categories</summary>
                        <ul class="bg-base-100 rounded-t-none p-2">
                            <li><a>Link 1</a></li>
                            <li><a>Link 2</a></li>
                        </ul>
                    </details>
                </li>
                <li><a>Deals</a></li>
                <li><a>What's New</a></li>
                @auth
                    @if ($user->isadmin)
                        <li><a href="{{ route('addproducts') }}">Add Products</a></li>
                    @endif
                @endauth


            </ul>
        </div>

        {{-- search --}}
        <div class="form-control">
            <input type="text" placeholder="Search" class="input input-bordered w-30 md:w-auto" />
        </div>

        {{-- user cart --}}
        @auth
            <div class="flex-none">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                        <div class="indicator">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="badge badge-sm indicator-item">8</span>
                        </div>
                    </div>
                    <div tabindex="0" class="card card-compact dropdown-content bg-base-100 z-[1] mt-3 w-52 shadow">
                        <div class="card-body">
                            <span class="text-lg font-bold">8 Items</span>
                            <span class="text-info">Subtotal: $999</span>
                            <div class="card-actions">
                                <button class="btn btn-primary btn-block">View cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img alt="Tailwind CSS Navbar component"
                                src="{{ Vite::asset('storage/app/' . $user->profile_image) }}" />
                        </div>
                    </div>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                        <li>
                            <a class="justify-between">
                                Profile
                                <span class="badge">New</span>
                            </a>
                        </li>
                        <li><a>Settings</a></li>
                        {{-- Sellers Products --}}
                        @auth
                            @if ($user->isadmin)
                                <li><a href="{{ route('seller.products', $user->id) }}">MyProducts</a></li>
                            @endif
                        @endauth
                        <!-- Authentication -->
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @endauth

        @guest
            <div>
                <ul class="menu menu-horizontal flex flex-row space-x-4 font-semibold">
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            </div>
        @endguest
    </div>

    {{ $slot }}


</body>

</html>
