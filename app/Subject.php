<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];
    public function students()
    {
        return $this->belongsToMany('App\Student');
    }

    public function modules()
    {
        return $this->hasMany('App\Module');
    }
}
