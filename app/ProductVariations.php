<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariations extends Model
{
    protected $fillable = ['product_id', 'attributes'];
}
