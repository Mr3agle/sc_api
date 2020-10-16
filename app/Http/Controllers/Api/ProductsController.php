<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;


class ProductsController extends Controller
{
    public function getAllProducts()
    {
        $allPosts = Product::all();
        return $allPosts;
    }

    public function registerProduct(Request $productData)
    {
        $productData->validate([
            'productName' => 'required',
            'productSlug' => 'required',
            'category_id' => 'required',
            'subCategory_id' => 'required',
            'categoryName' => 'required',
            'subCategoryName' => 'required'
        ]);

        return Product::create($productData->all());
    }

    public function updateProduct(Request $productData, $id)
    {
        $product = Product::find($id);
        $product->update($productData->all());

        return $product;
    }

    public function getOneProduct($id)
    {
        return Product::find($id);
    }

    public function deleteProduct($id)
    {
        Product::destroy($id);

        return ['message' => 'product successfully deleted'];
    }
}
