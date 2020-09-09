<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'header', 'text', 'excerpt','buttonText','buttonLink',
    ];
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
