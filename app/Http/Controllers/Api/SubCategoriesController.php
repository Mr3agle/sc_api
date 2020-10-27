<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SubCategory;

class SubCategoriesController extends Controller
{
    public function getAllSubCategories()
    {
        $allPosts = SubCategory::all();
        return $allPosts;
    }

    public function registerSubCategory(Request $subCategoryData)
    {
        $subCategoryData->validate([
            'category_id' => 'required',
            'subCategoryName' => 'required',
            'subCategorySlug' => 'required',
        ]);
        return SubCategory::create($subCategoryData->all());
    }

    public function updateSubCategory(Request $subCategoryData, $id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->update($subCategoryData->all());

        return $subCategory;
    }

    public function getOneSubCategory($id)
    {
        return SubCategory::find($id);
    }

    public function deleteSubCategory($id)
    {
        SubCategory::destroy($id);

        return ['message' => 'SubCategory successfully deleted'];
    }

    public function belongsToCategory($id)
    {
        $subCategory = SubCategory::find($id);
        $categoryThatBelongs = Category::where('id', $subCategory->category_id)->get();

        return $categoryThatBelongs;
    }
}
