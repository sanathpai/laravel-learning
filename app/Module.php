<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name', 'subject_id'];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
    public function submodules()
    {
        return $this->hasMany('App\SubModule');
    }
}
