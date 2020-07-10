<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['path'];
    public function submodule()
    {
        return $this->morphOne('App\SubModule', 'content');
    }
}
