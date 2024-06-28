<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        return Inertia::render('Category', [
            'category_name'=> Category::find($id),
            'products_by_category' => Product::where('category', $id)->get(),
        ]);
    }

}
