<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productName',
        'productSlug',
        'SKU',
        'productShortDesc',
        'category_id',
        'productPrice',
        'specialPrice',
        'subCategory_id',
        'categoryName',
        'subCategoryName',
        'thumbnail'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
