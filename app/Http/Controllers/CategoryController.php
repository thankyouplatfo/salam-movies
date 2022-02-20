<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::latest()->withCount('movies')->get(),

        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:categories,title|min:3|max:25',
            'slug' => 'required|unique:categories,slug',
            'image' => 'required|image'
        ]);

       $file_extension = $request -> image -> getClientOriginalExtension();
       $file_name = time().'.'.$file_extension;
       $path = 'images/categories';
       $request -> image -> move($path,$file_name);
        
       $request['slug'] = Str::slug($request->title);
        

        Category::create(
            ['title'=> $request->title,
            'slug'=>$request->slug,
            'image'=>$file_name,]
        );

        session()->flash('success', 'category stored.');
        return redirect()->route('admin.categories');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        //جعل الصورة اختيارية وحذف  unique
        $request->validate([
            'title' => 'required|min:3|max:25',            
        ]);

        if ( $request->hasFile('image') ){
            $request->validate([
                'image' => 'image'
            ]);
        }
        
        $request['slug'] = Str::slug($request->title);

        $category->update($request->except('image'));

        if ( $request->hasFile('image') ){
            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->image->move('images/categories', $file_name);

            if (File::exists(public_path('images/categories/' . $category->image))) {
                File::delete(public_path('images/categories/' . $category->image));
            }

            $category->update(['image' => $file_name]);
        }

        session()->flash('success', 'category stored.');
        return redirect()->route('admin.categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', 'category deleted.');

        return redirect()->route('admin.categories');
    }
}
