<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    
    protected $guarded = [];
  
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies(){
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
