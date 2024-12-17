<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Show the category for a given user.
     */
    public function index()
    {
        //Fetch the eloquent table
        $categories = Category::all();
        return view('admin.category.index', compact('categories'), ['title' => 'Show category']);
    }

    /**
     * Show the form to create a new Category create.
     */
    public function create()
    {
        return view('admin.category.create', ['title' => 'Add category']);
    }

    /**
     * Store a new category post.
     */
    public function store(Request $request)
    {
        // Validate and store the blog post...
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,gif',
            'status' => 'nullable',
            'created_by' => 'nullable'
        ]);

        $slug = Str::slug($request->name);
        $created_by = Auth::guard('admin')->id();

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/categories'), $imageName);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->description = $request->description;
        $category->image = $imageName;
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = $created_by;
        //Save
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Category created successfully!.');
    }

    /**
     * Edit the category for a given user.
     */
    public function edit()
    {
        return view('admin.category.edit');
    }
}
