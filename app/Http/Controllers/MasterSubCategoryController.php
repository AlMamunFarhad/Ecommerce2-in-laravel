<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class MasterSubCategoryController extends Controller
{

    public function sub_category(Request $request){
        $validate = $request->validate([
            'sub_category_name' => 'required|string|max:100',
            'category_id' => 'required|numeric|exists:categories,id',
        ]);
        SubCategory::create($validate);

        return redirect()->back()->with('success','Sub Category added successfully.');
    }

    public function editSubCategory(Request $request)
    {
        $edit = SubCategory::findOrFail($request->id);
        return view('admin.sub_category.edit',compact('edit'));
    }

    public function updateSubCategory(Request $request, string $id)
    {
        $validate = $request->validate([
          'update_sub_category' => 'required|string|unique:sub_categories,sub_category_name|max:100'
        ]);

        $update = SubCategory::findOrFail($id);
        $update->update([
            'sub_category_name' => $request->update_sub_category
         ]);

         return redirect()->route('sub.category.manage')->with('success','Sub Category updated successfully.');

    }

    public function deleteSubCategory(string $id)
    {
        $del_sub_category = SubCategory::findOrFail($id);
        $del_sub_category->delete();
        return redirect()->route('sub.category.manage')->with('delete','Sub Category deleted succefully.');
    }


}
