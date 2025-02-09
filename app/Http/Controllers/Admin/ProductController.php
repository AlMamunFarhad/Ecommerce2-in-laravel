<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function manage_product()
    {
        return view('admin.product.manage');
    }

    public function review_manage()
    {
        return view('admin.product.product_reviews');
    }
}
