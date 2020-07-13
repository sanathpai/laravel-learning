<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubModule extends Model
{
    protected $fillable = ['name', 'module_id'];
    public function content() //content_id, content_type

    {
        return $this->morphTo();
    }
    public function module()
    {
        return $this->belongsTo('App\Module');
    }
}
