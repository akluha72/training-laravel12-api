<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\CategoryResource;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

/**
 * @group Products
 *
 * Managing Products
 */
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(9);
        // return $products;
        return ProductResource::collection($products);
    }
}
