<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    public function store_category(Request $request)
    {
        $validated = $request->validate([
           'add_category' => 'required|string|unique:categories,category_name,|max:100'
        ]);

        $category = new Category();
        $category->category_name = $request->add_category;
        $category->save();

        return redirect()->route('category.manage')->with('Category added successfully.');
    }

    public function del_category(string $id)
    {
        $del_category = Category::findOrFail($id);
        $del_category->delete();
        return redirect()->route('category.manage')->with('delete','Category deleted succefully.');
    }

    public function edit_category(Request $request)
    {
        // $edit = Category::findOrFail($id);
        $edit = Category::findOrFail($request->id);
        return view('admin.category.edit',compact('edit'));
    }

    public function updateCategory(Request $request, string $id)
    {
        $validate = $request->validate([
          'update_category' => 'required|string|unique:categories,category_name|max:100'
        ]);

        $update = Category::findOrFail($id);
        $update->update([
            'category_name' => $request->update_category
         ]);

         return redirect()->route('category.manage')->with('success','Category updated successfully.');

    }


}
