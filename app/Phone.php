<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['phone_number', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
