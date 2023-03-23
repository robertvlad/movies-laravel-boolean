<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Movie;
use App\Models\Genere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMovieRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateMovieRequest;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        $form_data = $request->validated();

        $newMovie = new Movie();

        $newMovie->fill($form_data);

        $newMovie->save();

        return redirect()->route('admin.movies.index')->with('message', $newMovie->title.' aggiunto con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('admin.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {   
        $generes = Genere::all();
        $casts = Cast::all();
        return view('admin.movies.edit', compact('movie', 'generes','casts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, $movie)
    {

        $movie = Movie::find($movie);

        $form_data = $request->validated();

        $movie->update($form_data);

        if($request->has('casts')){
            $movie->casts()->sync($request->casts);
        }

        return redirect()->route('admin.movies.index')->with('message', $movie->title.' corretto correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('admin.movies.index')->with('deleteMessage', $movie->title.' Eliminato correttamente');
    }
}
