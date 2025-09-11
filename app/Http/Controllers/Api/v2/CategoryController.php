<?php

namespace App\Http\Controllers\Api\v2;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Http\Resources\CategoryResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

/**
 * @group Categories
 *
 * Managing Categories
 */

class CategoryController extends Controller
{
    /**
     * Get Categories
     *
     * Getting the list of the categories, so to create a description for each request write it on top of the function? really?!
     * 
     * @queryParam page Which page to show. Example: 12
     */
    public function index()
    {
        // return Category::all();
        abort_if(!auth()->user()->tokenCan('categories-list'), 403);
        // return CategoryResource::collection(Category::all());
        return CategoryResource::collection(Category::where('id', '<', 3)->get());
    }

    public function show(Category $category)
    {
        abort_if(!auth()->user()->tokenCan('categories-show'), 403);
        return new CategoryResource($category);
    }

    public function list()
    {
        return CategoryResource::collection(Category::all());
    }


    /**
     * POST categories
     *
     * @bodyParam name string required Name of the category. Example: "Clothing
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = 'categories/' . Str::uuid() . '.' . $file->extension();
            $file->storePubliclyAs('public', $name);
            $data['photo'] = $name;
        }

        $category = Category::create($data);

        return new CategoryResource($category);
    }

    public function update(Category $category, StoreCategoryRequest $request)
    {
        $category->update($request->all());
        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        // return response(null, Response::HTTP_NO_CONTENT);
        return response()->noContent();
    }
}
