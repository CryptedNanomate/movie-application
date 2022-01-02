<?php

namespace App\ViewModels;


use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel

{
    public $popularMovies;
    public $nowPlayingMovies;
    public $genres;
   // public $movie;

    public function __construct($popularMovies, $nowPlayingMovies, $genres)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genres = $genres;
     //   $this->movie = $movie;

    }
    // public function movie(){
    //     $this->movie=$movie;
    // }
    
    public function popularMovies()
    {
        return $this->formatMovies($this->popularMovies);
        
    }
    public function nowPlayingMovies()
    {
        return  $this->formatMovies($this->nowPlayingMovies);
    }
    
    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });
    }
 
    public function formatMovies($movies)
    {
        // @foreach($movie['genre_ids'] as $genre)
        // {{ $genres -> get($genre) }} @if (!$loop->last), @endif
        // @if ($loop->last) . @endif
        // @endforeach
       
        return collect($movies)->map(function($movie) {
            $genresFormated = collect($movie['genre_ids'])->mapWithKeys(function($value){
                return [$value => $this->genres()->get($value)];
            })->implode(',');
            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'],
                'vote_average' => $movie['vote_average'] *10 .'%',
                'release_date' => Carbon::parse($movie['vote_average'])->format('M d, Y'), 
                'genres' => $genresFormated,
            ])->only([
                'poster_path', 'id' , 'genre_ids', 'title','vote_average','overview','release_date','genres',
            ]);

            });//->dump();
    }

}
