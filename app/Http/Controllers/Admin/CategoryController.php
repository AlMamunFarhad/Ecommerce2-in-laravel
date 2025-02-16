<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    
    public function create_category()
    {
        return view('admin.category.create');
    }

    public function manage_category()
    {
        $categories = Category::get();
        return view('admin.category.manage', compact('categories'));
    }
}
