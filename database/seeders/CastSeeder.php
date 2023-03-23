<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cast;
use Illuminate\Support\Str;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $casts = config('cast');

        foreach ($casts as $cast) {
            
            $newCast = new Cast();
            $newCast->name_surname = $cast;
            $newCast->slug = Str::slug($newCast->name_surname, '-');
            $newCast->save();
        }
    }
}
