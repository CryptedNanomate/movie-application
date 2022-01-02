<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie app</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    
    

    <livewire:styles>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex items-center justify-between px-4 py-6 flex flex-col md:flex-row">
            <ul class="flex items-center flex-col md:flex-row   ">
                <li class="md:ml-16">
                    <a href="{{route('movies.index')}}">Aleksandar's Theatare<i class="fas fa-theater-masks"></i>
                </a>
                
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{route('movies.index') }}" class="ml-16 hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{route('tv.index')}}" class="ml-6 hover:text-gray-300">Tv Shows</a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('actors.index') }}" class="ml-6 hover:text-gray-300">Actors</a>
                </li>
                @guest
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{route('login')}}" class="ml-6 hover:text-gray-300">Login or Register</a>
                </li>
                @else
                <li class="md:ml-16 mt-3 md:mt-0">
                    <p>Hi {{ Auth::user()->name }}</p>
                </li>

                <li class="md:ml-16 mt-3 md:mt-0">
                    <a class href="{{route('logout')}}">Logout</a>
                </li>
                @endguest
                
                <!-- click me... -->
                <li class="md:ml-16 mt-3 md:mt-0">
                         <a href="{{route('secret')}}" class="ml-6 hover:text-gray-300" style="opacity:0">asdas</a>
                </li>

            </ul>
            <div class="flex items-center flex-col md:flex-row">
               <livewire:search-dropdown>
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="#">
                        <img src="/images/avatar.jpg" alt="avatar" class="rounded-full w-8 h-8">
                    </a>
                </div>
            </div>
        </div>
    </nav>
     @yield('content')
     <livewire:scripts>
    @yield('scripts')
    <script src="{{'js/app.js'}}">
    </script>
</body>
</html>