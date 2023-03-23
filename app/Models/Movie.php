<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    use HasFactory;

    protected $fillable = ['title', 'original_title', 'nationality', 'release_date', 'vote', 'cast_id', 'cover_path', 'genere_id'];

    public function genere(){
        return $this->belongsTo(Genere::class);
    }

    public function casts(){
        return $this->belongsToMany(Cast::class);
    }
}
