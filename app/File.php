<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['path'];
    public function submodule()
    {
        return $this->morphOne('App\SubModule', 'content');
    }
}
