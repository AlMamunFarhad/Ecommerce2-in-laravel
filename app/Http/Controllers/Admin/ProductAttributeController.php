<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function product_attribute()
    {
        
        return view('admin.product_attribute.create');
    }

    public function manage_attribute()
    {
        $attributes = DefaultAttribute::all();
        return view('admin.product_attribute.manage', compact('attributes'));
    }

    public function store_attribute(Request $request){
        $validate = $request->validate([
            'attribute_value' => 'required|string|max:100',
        ]);
        DefaultAttribute::create($validate);

        return redirect()->route('product.attribute.manage')->with('success','Attribute added successfully.');
    }

    public function edit_attribute(Request $request)
    {
        $edit = DefaultAttribute::findOrFail($request->id);
        return view('admin.product_attribute.edit',compact('edit'));
    }

    public function update_attribute(Request $request, string $id)
    {
        $validate = $request->validate([
          'update_attribute' => 'required|string|unique:sub_categories,sub_category_name|max:100'
        ]);

        $update = DefaultAttribute::findOrFail($id);
        $update->update([
            'attribute_value' => $request->update_attribute
         ]);

         return redirect()->route('product.attribute.manage')->with('success','Attribute updated successfully.');

    }

    public function delete_attribute(string $id)
    {
        $delete_attribute = DefaultAttribute::findOrFail($id);
        $delete_attribute->delete();
        return redirect()->route('product.attribute.manage')->with('delete','Attribute deleted succefully.');
    }
}
