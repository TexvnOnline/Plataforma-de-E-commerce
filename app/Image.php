<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'url',
    ];
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at'];
    public function imageable()
    {
        return $this->morphTo();
    }
}
