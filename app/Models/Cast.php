<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cast extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = ['name_surname', 'slug'];

    public function movies(){
        return $this->belongsToMany(Movie::class);
    }
    public static function generateSlug($name_surname){
        return Str::slug($name_surname, '-');
    }

}

