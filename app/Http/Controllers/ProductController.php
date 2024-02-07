<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function showProduct($slug)
    {
        $mainCategory = MainCategory::with('subcategories')->get();
        $subCategory = SubCategory::where('slug', $slug)->first();
        $product = Product::where('sub_category_id', $subCategory->id)->get();
        return view('shop.product', compact('mainCategory', 'subCategory', 'product'));
    }

    public function showSingleProduct(){
        $mainCategory = MainCategory::with('subcategories')->get();
        return view('shop.single_product', compact('mainCategory'));
    }
}
