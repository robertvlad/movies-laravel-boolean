<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Movie;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = config('Movies');

        foreach($movies as $movie){

            $newmovie = new Movie();

            $newmovie->title = $movie['title'];
            $newmovie->original_title = $movie['original_title'];
            $newmovie->nationality = $movie['nationality'];
            $newmovie->release_date = $movie['release_date'];
            $newmovie->vote = $movie['vote'];
            $newmovie->cover_path = $movie['cover_path'];

            $newmovie->save();


        }

    }
}
