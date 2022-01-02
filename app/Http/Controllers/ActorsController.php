<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ViewModels\ActorsViewModel;
use App\ViewModels\ActorViewModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class ActorsController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        abort_if($page > 500, 204);

        $popularActors = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/person/popular?page='.$page)
        ->json()['results'];

        // dd($popularActors);
        // foreach($popularActors as $popularActor)
        // {
        //      $value = Arr::crossJoin('1','2','3');

        //     //dd($value);
        //    DB::table('actors_table')->insert(['name'=>$popularActor['name'],'known_for'=>$value['0'],'profile_path'=>$popularActor['profile_path']]);
        //    //dd($popularActor);
         
         
        // }
       
    

        $viewModel = new ActorsViewModel($popularActors, $page);
        return view('actors.index', $viewModel);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actor = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id)
        ->json();

      

        // $social = Http::withToken(config('services.tmdb.token'))
        // ->get('https://api.themoviedb.org/3/person/'.$id.'/external_ids')
        // ->json();

        $credits = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits')
        ->json();

        $viewModel = new ActorViewModel($actor, $credits);
        return view('actors.show', $viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
