<?php

namespace App\ViewModels;
use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
    public $actor;
    public $credits;
    public function __construct($actor,$credits)
    {
        $this->actor = $actor;
        $this->credits = $credits;
    }
    public function actor()
    {
        return collect($this->actor)->merge([
            'birthday'=>Carbon::parse($this->actor['birthday'])->format('M d, Y'),
            'age'=>Carbon::parse($this->actor['birthday'])->age,
            'profile_path' =>$this->actor['profile_path']
                ? 'https://image.tmdb.org/t/p/w300/'.$this->actor['profile_path']
                : 'https://via.placeholder.com/300x450',
        ]);//->dump();
    }
public function knownForMovies()
    {
        $castMovies = collect($this->credits)->get('cast');
        return collect($castMovies)->sortByDesc('popularity')->take(5)->map(function($movie){
            if (isset($movie['title'])) {
                $title = $movie['title'];
            } elseif (isset($movie['name'])) {
                $title = $movie['name'];
            } else {
                $title = 'Untitled';
            }
            return collect($movie)->merge([
                'poster_path' =>$movie['poster_path']
                    ? 'https://image.tmdb.org/t/p/w185/'.$movie['poster_path']
                    : 'https://via.placeholder.com/300x450',
                'title' =>$title,
                'linkToPage' => $movie['media_type'] === 'movie' ? route('movies.show', $movie['id']) : route('tv.show', $movie['id'])
            ])->only([
                'poster_path','title', 'id', 'media_type', 'linkToPage',
            ]);
        });//->dump();
    }


    public function credits()
        {
            $castMovies = collect($this->credits)->get('cast');
            return collect($castMovies)->map(function($movie){
                if(isset($movie['release_date'])){
                    $release_date = $movie['release_date'];
                }elseif (isset($movie['first_air_date'])){
                    $release_date = $movie['first_air_date'];
                }else {
                    $release_date = '';
                }
                if(isset($movie['title'])){
                    $title = $movie['title'];
                }elseif (isset($movie['name'])){
                    $title = $movie['name'];
                }else {
                    $title = 'Untitled...';
                }

                return collect($movie)->merge([
                    'release_date' => $release_date,
                    'release_year' => isset($releaseDate) ? Carbon::parse($releaseDate)->format('Y') : 'Future',
                    'title' => $title,
                    'character' => isset($movie['character']) ? $movie['character'] : '' , 

                ]);
            })->sortByDesc('release_date');
        }

    }
