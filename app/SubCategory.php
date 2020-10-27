<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'category_id',
        'subCategoryName',
        'subCategorySlug'
    ];

    public function product()
    {
        return $this->belongsTo('App\Category');
    }
}
