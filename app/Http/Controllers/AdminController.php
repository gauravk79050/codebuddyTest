<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class AdminController extends Controller
{
    public function index() {
        return view('admin/dashboard');
    }

    public function loginAsUser(User $user)
    {
        
            auth()->login($user);
            return redirect()->route('user');
    }

    public function customers() {
        $users = user::all()->where('role','user');
        return view('admin/customers', compact('users'));

    }
    public function categories() {
    $categories = Category::all();
    $categoryTree = [];

    foreach ($categories as $category) {
        if (is_null($category->parent_id)) {
            $categoryTree[] = $this->buildCategoryTree($category);
        }
    }
    return view('admin/categories',compact('categoryTree'));
    }
    
    function buildCategoryTree($category)
    {
        $subcategoryTree = [];

        $subcategories = Category::where('parent_id', $category->id)->get();

        foreach ($subcategories as $subcategory) {
            $subcategoryTree[] = $this->buildCategoryTree($subcategory);
        }

        return [
            'id' => $category->id,
            'name' => $category->name,
            'subcategories' => $subcategoryTree,
        ];
    }

    public function addCategories() {
        $categories = category::all();
        
        return view('admin/addcategories' ,compact('categories'));
    }

    public function storeCategory(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create([
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
        ]);

        return redirect()->route('addCategories')->with('success', 'Category created successfully.');
    

    }
}
