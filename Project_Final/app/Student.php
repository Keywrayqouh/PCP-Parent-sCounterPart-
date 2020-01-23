<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    protected $fillable =[
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'age',
        'gender',
        'address',


    ];
}
