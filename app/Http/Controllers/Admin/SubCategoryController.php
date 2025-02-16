<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    
    public function create_subcategory()
    {
        $categories = Category::all();
        return view('admin.sub_category.create', compact('categories'));
    }

    public function sub_category()
    {
        $sub_categories = SubCategory::get();
        return view('admin.sub_category.manage', compact('sub_categories'));
    }
}
