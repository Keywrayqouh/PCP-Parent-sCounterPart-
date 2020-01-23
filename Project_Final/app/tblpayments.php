<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblpayments extends Model
{
    public $timestamps = false;
    protected $fillable =[
        'id',
        'month',
        'year',
        'amount',
        'dateofpayment',
       
        


    ];
}
