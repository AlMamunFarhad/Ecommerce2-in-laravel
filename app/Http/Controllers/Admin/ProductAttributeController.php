<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function product_attribute()
    {
        return view('admin.product_attribute.create');
    }

    public function manage_attribute()
    {
        return view('admin.product_attribute.manage');
    }
}
