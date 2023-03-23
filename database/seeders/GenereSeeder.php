<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Genere;

class GenereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generes = ['Horror', 'Pulp', 'Action', 'Comic', 'Fantasy', 'sci-fii'];

        foreach($generes as $genere){
            $newGenere = new Genere();
            $newGenere->genere = $genere;
            $newGenere->slug = Str::slug($newGenere->genere, '-');

            $newGenere->save();
        }
    }
}
