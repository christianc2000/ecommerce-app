<header class="bg-violet-700 sticky z-50 top-0" x-data="dropdown()">
    <div class="container flex items-center h-16 max-w-7xl px-4 mx-auto sm:px-6 lg:px-8 justify-between md:justify-start">
        <a :class="{ 'bg-opacity-100 text-blue-300': open }" x-on:click="show()"
            class="flex flex-col items-center justify-center order-last md:order-first px-8 md:px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="text-sm hidden md:block">Categorías</span>
        </a>
        <a href="/" class="mx-6">
            {{-- <x-jet-application-mark class="block h-9 w-auto" /> --}}
            <x-logo size="50" />
        </a>
        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>

        <div class="mx-6 relative hidden md:block">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>

                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        {{--   @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-dropdown-link>
                    @endif --}}

                        <div class="border-t border-gray-200"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        {{-- <i class="fas fa-user-circle text-white cursor-pointer text-3xl"></i> --}}
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <i class="fas fa-user-circle text-white cursor-pointer text-3xl rounded-full object-cover"></i>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-dropdown-link>

                        <x-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-dropdown-link>

                    </x-slot>

                </x-dropdown>
            @endauth

        </div>

        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>

    </div>
    <nav id="navigation-menu" :class="{ 'block': open, 'hidden': !open }" x-show="open"
        class="bg-violet-500 bg-opacity-25 w-full absolute hidden">
        {{-- Menu computadora --}}
        <div class="container h-full max-w-7xl px-4 mx-auto sm:px-6 lg:px-8 hidden md:block">
            <div x-on:click.away="close()" class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-gray-500 hover:bg-gray-500 hover:text-white">
                            <a href="{{route('categories.show',$category)}}" class="py-2 px-4 text-sm flex items-center">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                                {{ $category->name }}
                            </a>
                            <div class="navigation-submenu bg-gray-100 absolute w-3/4 h-full top-0 right-0 hidden">
                                <!---->
                                <x-navigation-subcategories :category="$category" />
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>
            </div>
        </div>
        {{-- Menu Móvil --}}
        <div class="bg-white h-full overflow-y-auto">
        <div class="bg-gray-100 py-3 mb-2 px-4 sm:px-6">
                @livewire('search')
            </div>
            <ul>

                @foreach ($categories as $category)
                    <li class="text-gray-500 hover:bg-gray-500 hover:text-white">
                        <a href="{{route('categories.show',$category)}}" class="py-2 px-4 text-sm flex items-center">
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <p class="text-gray-500 px-6 my-2">USUARIOS</p>
            @livewire('cart-mobil')
            @auth
                <a href="{{ route('profile.show') }}"
                    class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-gray-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-address-card"></i>
                    </span>
                    Perfil
                </a>
                <a href=""
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"
                    class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-gray-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('login') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('profile.show') }}"
                    class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-gray-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user-circle"></i>
                    </span>
                    Iniciar Sesión
                </a>

                <a href="{{ route('register') }}"
                    class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-gray-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-fingerprint"></i>
                    </span>
                    Registrar
                </a>
            @endauth
        </div>
    </nav>
</header>
