<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home()
    {
        return view('welcome', ['items' => Category::all()]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $movies = Movie::where('category_id', $category->id)->latest()->paginate(8);

        // dd($movies->links());
        return view('category', [
            'items' => Category::all(),
            'category' => $category,
            'movies' => $movies,
        ]);
    }
}
