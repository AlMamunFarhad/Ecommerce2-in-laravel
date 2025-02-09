<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function create_category()
    {
        return view('admin.category.create');
    }

    public function manage_category()
    {
        return view('admin.category.manage');
    }
}
