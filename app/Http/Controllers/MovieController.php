<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.movies.index', [
            'movies' => Movie::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.movies.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'title' => 'required|min:3|max:33',
            'rate' => 'required|min:1|max:5',
            'year' => 'required|min:4|max:4',
            'description' => 'required|min:25|max:443',
            'director' => 'required|min:3|max:25',
            'country' => 'required',
            'url' => 'required',
            'category_id' => 'required',
        ]);

       $file_extension = $request -> image -> getClientOriginalExtension();
       $file_name = time().'.'.$file_extension;
       $path = 'images/movies';
       $request -> image -> move($path,$file_name);
            

        Movie::create([
            'image' => $file_name,
            'title' => $request->title,
            'rate' => $request->rate,
            'year' => $request->year,
            'description' => $request->description,
            'director' => $request->director,
            'country' => $request->country,
            'url' => $request->url,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', [
            'movie' => $movie,
            'categories' => Category::all()
        ]);
    }
    //public function edit(Category $category)
    //{
    //    return view('admin.categories.edit', [
    //        'category' => $category
    //    ]);
    //}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|min:3|max:33',
            'rate' => 'required|min:1|max:5',
            'year' => 'required|min:4|max:4',
            'description' => 'required|min:25|max:443',
            'director' => 'required|min:3|max:25',
            'country' => 'required',
            'url' => 'required',
            'category_id' => 'required',
        ]);
        
        if ( $request->hasFile('image') ){
            $request->validate([
                'image' => 'image'
            ]);
        }

        $movie->update($request->except('image'));


        if ( $request->hasFile('image') ){
            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->image->move('images/movies', $file_name); 

            if (File::exists(public_path('images/movies/' . $movie->image))) {
                File::delete(public_path('images/movies/' . $movie->image));
            }

            $movie->update(['image' => $file_name]);
        }
       
        session()->flash('success', 'movie update');
        return redirect()->route('admin.movies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        session()->flash('success', 'movie deleted.');
        return redirect()->route('admin.movies');
    }
}
