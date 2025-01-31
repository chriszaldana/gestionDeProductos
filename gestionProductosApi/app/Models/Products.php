<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //Lo que se va a necesitar para poder insertar datos en la tabla
    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'stock'
    ];
}
