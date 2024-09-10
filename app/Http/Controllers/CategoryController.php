<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function index()
    {
        // Fetch all categories
        $categories = Category::all();
        // Return the view with the categories data
        return view('posts.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required',
        ]);

        // Create a new category using mass assignment
        $category = Category::create($validatedData);

        // Flash a success message to the session
        Session::flash('success', 'New Category has been created');

        // Redirect to the categories index route
        return redirect()->route('categories.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
