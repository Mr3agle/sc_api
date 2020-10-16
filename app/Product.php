<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productName',
        'productSlug',
        'category_id',
        'subCategory_id',
        'categoryName',
        'subCategoryName'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
