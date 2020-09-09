<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'module', 'slug','icon','front',
    ];
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at'];
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }
    public function tags(){
        return $this->hasMany(Tag::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
