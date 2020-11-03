<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>

    <body class="bg-gray-100 h-screen antialiased leading-none">
        <div id="app">
            <nav class="bg-teal-700 shadow mb-8 py-6">
                <div class="container mx-auto px-6 md:px-0">
                    <div class="flex items-center justify-center">
                        <div class="mr-6">
                            <a href="{{ url('/') }}"
                                class="text-3xl font-semibold text-gray-100 no-underline mr-5">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                            <a href="/products"
                                class="no-underline hover:underline text-gray-300 text-sm p-3">Products</a>
                            <a href="/products/create"
                                class="no-underline hover:underline text-gray-300 text-sm p-3">Create Product</a>
                            <a href="/categories/create"
                                class="no-underline hover:underline text-gray-300 text-sm p-3">Create Category</a>
                        </div>

                        <div class="flex-1 text-right">
                            @guest
                                <a class="no-underline hover:underline text-gray-300 text-sm p-3"
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                                @if(Route::has('register'))
                                    <a class="no-underline hover:underline text-gray-300 text-sm p-3"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            @else
                                <span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</span>
                                <a href="{{ route('logout') }}"
                                    class="no-underline hover:underline text-gray-300 text-sm p-3"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container">
                @yield('content')
                @include('partials.footer')
            </div>
        </div>
    </body>
    <script>
        function toggleNav() {

            x = document.getElementById('drop-menu');
            if (x.classList.contains('hidden')) {
                x.classList.remove('hidden');
                x.classList.add('block');
            } else if (x.classList.contains('block')) {
                x.classList.remove('block');
                x.classList.add('hidden');
            }
        }

    </script>

</html>
