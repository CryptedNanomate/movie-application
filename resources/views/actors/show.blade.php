@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row ">
            <div class="flex-none">
            <img src="{{ $actor['profile_path']}}" alt="" class="w-64 md:w-96" >
            <ul class="flex items-center mt-4">
                <li class="ml-6">
                    <a href="#" title="facebook">
                    <!-- <svg class="fill-current text-gray-400 hover:text-white w-6" viewBox="0 0 448 512"><path d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z"/></svg> -->
                    </a>
                </li>
            </ul>
            </div>
            
            <div class="md:ml-24">
               <h2 class="text-4xl font-semibold">{{$actor['name']}}</h2>
               <div class="flex flex-wrap items-center text-gray-400 text-sm">                       
               <svg class="fill-current text-gray-400 hover:text-white w-4 mt-2" viewBox="0 0 448 512"><path d="M448 384c-28.02 0-31.26-32-74.5-32-43.43 0-46.825 32-74.75 32-27.695 0-31.454-32-74.75-32-42.842 0-47.218 32-74.5 32-28.148 0-31.202-32-74.75-32-43.547 0-46.653 32-74.75 32v-80c0-26.5 21.5-48 48-48h16V112h64v144h64V112h64v144h64V112h64v144h16c26.5 0 48 21.5 48 48v80zm0 128H0v-96c43.356 0 46.767-32 74.75-32 27.951 0 31.253 32 74.75 32 42.843 0 47.217-32 74.5-32 28.148 0 31.201 32 74.75 32 43.357 0 46.767-32 74.75-32 27.488 0 31.252 32 74.5 32v96zM96 96c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40z"/></svg>
                        <span class="ml-2 mt-2">{{ $actor['birthday'] }} ({{ ($actor['age'])}} years old ) in {{ $actor['place_of_birth']}}</span>
                <p class="text-gray-300 mt-8">
               {{$actor['biography']}}
                </p>
                <h4 class="font-semibold mt-12 ">Known for</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach($knownForMovies as $movie)
                    <div class="mt-4">
                        <a href="{{ $movie['linkToPage'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
                            <img src="{{ $movie['poster_path'] }}" alt="">
                        </a>
                        <a href="{{ $movie['linkToPage'] }}" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">{{$movie['title'] }}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="credits border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>
            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach($credits as $credit)
                <li>{{ $credit['release_year'] }} &midot; <strong> {{$credit['title']}}</strong> as {{$credit['character']}}</li>
                @endforeach
            </ul>
        </div>
</div>            
 @endsection
