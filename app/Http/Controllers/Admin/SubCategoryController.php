<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    
    public function create_subcategory()
    {
        return view('admin.sub_category.create');
    }

    public function sub_category()
    {
        return view('admin.sub_category.manage');
    }
}
