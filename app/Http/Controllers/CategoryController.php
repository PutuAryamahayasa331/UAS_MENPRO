<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Jobs;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('guest.categories', [
            'title' => 'HandyHelp | Categories',
            'categories' => Category::all()
        ]);
    }

    // public function category(Category $category)
    // {
    //     if (request('category')) {
    //         $category = Category::firstWhere('slug', request('category'));
    //     }

    //     return view('guest.category', [
    //         'title' => 'Jobs in ' . $category->name,
    //         'jobs' => Jobs::with(['category', 'User', 'city'])->latest()->filter(request(['search', 'category']))->paginate(10)->withQueryString(),
    //         'cities' => City::all(),
    //         'categories' => Category::all(),
    //         'category' => $category->name
    //     ]);
    // }
}
