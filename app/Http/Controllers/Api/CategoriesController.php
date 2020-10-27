<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;

class CategoriesController extends Controller
{
    public function getAllCategories()
    {
        $allPosts = Category::all();
        return $allPosts;
    }

    public function registerCategory(Request $CategoryData)
    {
        $CategoryData->validate([
            'categoryName' => 'required',
            'categorySlug' => 'required',
        ]);
        return Category::create($CategoryData->all());
    }

    public function updateCategory(Request $CategoryData, $id)
    {
        $Category = Category::find($id);
        $Category->update($CategoryData->all());

        return $Category;
    }

    public function getOneCategory($id)
    {
        return Category::find($id);
    }

    public function deleteCategory($id)
    {
        Category::destroy($id);

        return ['message' => 'Category successfully deleted'];
    }
    public function hasSubcategories($id)
    {
        $category = Category::find($id);
        $hasManySubcategories = SubCategory::where('category_id', $category->id)->get();

        return $hasManySubcategories;
    }
}
