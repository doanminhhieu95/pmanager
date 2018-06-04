<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    Protected $fillable = [
        'imagePath',
        'title',
        'description',
        'price'
    ];
}
