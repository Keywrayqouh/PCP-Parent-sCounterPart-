<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblscholars extends Model
{
    public $timestamps = false;
    protected $fillable =[
        'first_name',
        'middle_name',
        'last_name',
        'batch',
        'contact_number',
        'email',
        


    ];
}
