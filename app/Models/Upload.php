<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $fillable =[
        'title',
        'firstname',
        'lastname',
        'lastname',
        'gender',
        'specialty',
        'practice',
        'phone',
        'fax',
        'email',
        'address',
        'city',
        'county',
        'state',
        'zip',
        'latitude',
        'longitude',
        'siccode',
        'website',
    ];
}
