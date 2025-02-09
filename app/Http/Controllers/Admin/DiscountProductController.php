<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountProductController extends Controller
{
    public function discount_product()
    {
        return view('admin.discount.create');
    }

    public function discount_manage()
    {
        return view('admin.discount.manage');
    }
}
