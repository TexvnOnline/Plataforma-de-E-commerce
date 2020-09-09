<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{ 
    use SoftDeletes;
    protected $fillable = [
        'user_id','subcategory_id','name','slug','stock','quantity','actualPrice','previousPrice','discountRate','shortDescription','longDescription','state','status',
    ];
    protected $dates = ['deleted_at'];

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function comments(){
        return $this->morphMany(Commet::class, 'commentable')->whereNull('parent_id')->orderBy('id','DESC');
    }
}
