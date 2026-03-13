<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Characters extends Model
{
    //
    protected  $table = 'characters';

    protected $fillable = [
        'name',
        'title',
        'universe'
    ];
}
