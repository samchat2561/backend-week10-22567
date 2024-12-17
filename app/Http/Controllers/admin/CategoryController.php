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
        return view('admin.category.index', ['title' => 'Show category']);
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
    }

    /**
     * Edit the category for a given user.
     */
    public function edit()
    {
        return view('admin.category.edit');
    }
}
