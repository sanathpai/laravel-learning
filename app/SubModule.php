<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubModule extends Model
{
    protected $fillable = ['name', 'module_id'];
    public function content()
    {
        return $this->morphTo();
    }
    public function module()
    {
        return $this->belongsTo('App\Module');
    }
}
