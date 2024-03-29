<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Gustavo Pizzeria') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased flex flex-col min-h-screen">
        <div class="bg-white shadow-md" x-data="{ isOpen: false }">
            <nav class="container py-8 mx-auto md:flex md:justify-between md:items-center">
              <div class="left-0 top-0 flex pl-2">
                @if (!Auth::user())
                <div>
                  <a href="{{ route('login') }}" class="text-transparent bg-clip-text bg-gradient-to-r pr-3 from-red-400 to-green-500 hover:text-green-400 transition-color duration-300">Login</a>
                </div>
                <div>
                  <a href="{{ route('register') }}" class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-green-500 hover:text-green-400 transition-color duration-300">Register</a>
                </div>
                @else
                  <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                  </form>
                  <div>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-green-500 hover:text-green-400 transition-color duration-300 pr-3">Logout</a>
                  </div>
                  <div>
                    <a href="{{ route('cart.index') }}" class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-green-500 hover:text-green-400 transition-color duration-300">Shopping Cart</a>
                  </div>
                @endif
                
              </div>
                <div class="flex items-center justify-between">
                    <a class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-green-500 md:text-2xl hover:text-green-400 transition-color duration-300 pl-2"
                        href="/">
                        Gustavo Pizzeria
                    </a>
                    
                    <!-- Mobile menu button -->
                    <div @click="isOpen = !isOpen" class="flex md:hidden">
                        <button type="button"
                            class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400 transition-color duration-300"
                            aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                                <path fill-rule="evenodd"
                                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
    
                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div :class="isOpen ? 'flex pl-2' : 'hidden'"
                    class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
                    <a class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-green-500 hover:text-green-400 transition-color duration-300"
                        href="/">Home</a>
                    <a class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-green-500 hover:text-green-400 transition-color duration-300"
                        href="{{ route('categories.index') }}">Categories</a>
                    <a class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-green-500 hover:text-green-400 transition-color duration-300"
                        href="{{ route('menus.index') }}">Our Menu</a>
                    <a class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-green-500 hover:text-green-400 transition-color duration-300"
                        href="{{ route('reservations.step.one') }}">Make Reservation</a>
    
                </div>
            </nav>
        </div>
        <div>
          @if (session()->has('danger'))
              <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                  role="alert">
                  <span class="font-medium">{{ session()->get('danger') }}!</span>
              </div>
          @endif
          @if (session()->has('success'))
              <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                  role="alert">
                  <span class="font-medium">{{ session()->get('success') }}!</span>
              </div>
          @endif
          @if (session()->has('warning'))
              <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                  role="alert">
                  <span class="font-medium">{{ session()->get('warning') }}!</span>
              </div>
          @endif
      </div>
        <div class="font-sans text-gray-900 antialiased min-h-screen">
            {{ $slot }}
        </div>
        </div>
        <footer class="bg-gray-800 border-t border-gray-200">
            <div class="container flex flex-wrap items-center justify-center px-4 py-8 mx-auto lg:justify-between">
              <div class="flex flex-wrap justify-center pr-2">
                <ul class="flex items-center space-x-4 text-gray-200">

                  <a href="{{route('home')}}" class="hover:text-white transition-color duration-300">
                    <li>Home</li>
                  </a>

                  <a href="{{route('about')}}" class="hover:text-white transition-color duration-300">
                    <li>About</li>
                  </a>

                  <a href="{{route('contact')}}" class="hover:text-white transition-color duration-300">
                    <li>Contact</li>
                  </a>
                  
                </ul>
              </div>
              <div class="flex justify-centers lg:mt-0 mt-0">
                <a>
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-6 h-6 text-blue-600" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                  </svg>
                </a>
                <a class="ml-3">
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-6 h-6 text-blue-300" viewBox="0 0 24 24">
                    <path
                      d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                    </path>
                  </svg>
                </a>
                <a class="ml-3">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-6 h-6 text-pink-400" viewBox="0 0 24 24">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                  </svg>
                </a>
                <a class="ml-3">
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="0" class="w-6 h-6 text-blue-500" viewBox="0 0 24 24">
                    <path stroke="none"
                      d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                    <circle cx="4" cy="4" r="2" stroke="none"></circle>
                  </svg>
                </a>
              </div>
            </div>
          </footer>
    </body>
</html>
