<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    //
    protected $fillable = [
            'first_name',
            'middle_name',
            'last_name',
            'email',
        ];
    protected $hidden = [
        'password'
    ];
}
