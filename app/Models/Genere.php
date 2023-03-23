<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Genere extends Model
{
    use HasFactory;

    protected $fillable = ['genere', 'slug'];

    public function movies(){
        return $this->hasMany(Movie::class);
    }
    public static function generateSlug($genere){
        return Str::slug($genere, '-');
    }
}
