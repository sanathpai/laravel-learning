<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $fillable = ['content'];
    public function submodule()
    {
        return $this->morphOne('App\SubModule', 'content');
    }
}
