<!-- An unexamined life is not worth living. - Socrates -->
<!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->

<div class="mt-8">
                   <a href="{{ route('tv.show', $tvshow['id']) }}">
                       <img src="{{ $tvshow['poster_path'] }}" class="hover:opacity-75 transition ease-in-out duration-150" alt="poster">
                   </a>
                   <div class="mt-2">
                       <a href="{{ route('tv.show', $tvshow['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $tvshow['original_name'] }}</a>
                       <div class="flex items-center text-gray-400 text-sm mt-1">
                       <i class="fas fa-star text-yellow-500"></i>
                           <span class="ml-1">{{ $tvshow['vote_average']}}</span>
                           <span class="mx-2"> | </span>
                           <span>1.01.1970</span>
                           
                       </div>
                       <div class="text-gray-400 text-sm">
                         {{$tvshow['genres'] }}
                       </div>
                   </div>
</div>
