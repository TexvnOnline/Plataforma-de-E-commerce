<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','category_id','slug',
    ];
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at'];
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
