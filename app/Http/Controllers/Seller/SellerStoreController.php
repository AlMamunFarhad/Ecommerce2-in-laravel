<?php

namespace App\Http\Controllers\Seller;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerStoreController extends Controller
{
    public function index()
    {
        return view('seller.store.create');
    }

    public function manage()
    {
        $stores = Store::get();
        return view('seller.store.manage', compact('stores'));
    }

    public function store_publish(Request $request)
    {
        $request->validate([
            'store_name' => 'required|unique:stores,store_name,id',
            'slug' => 'required',
            'details' => 'required',
        ]);

        $store = new \App\Models\Store();
        $store->store_name = $request->store_name;
        $store->slug = $request->slug;
        $store->details = $request->details;
        $store->user_id = auth()->user()->id;
        $store->save();

        return redirect()->route('vendor.store.manage')->with('success', 'Store created successfully');
    }

    public function edit_store($id)
    {
        $edit = Store::find($id);
        return view('seller.store.edit', compact('edit'));
    }

    public function update_store(Request $request, $id)
    {
        $request->validate([
            'store_name' => 'required|unique:stores,store_name,id',
            'slug' => 'required',
            'details' => 'required',
        ]);

        $store = Store::find($id);
        $store->store_name = $request->store_name;
        $store->slug = $request->slug;
        $store->details = $request->details;
        $store->user_id = auth()->user()->id;
        $store->save();

        return redirect()->route('vendor.store.manage')->with('success', 'Store updated successfully');
    }

    public function delete_store($id)
    {
        $store = Store::find($id);
        $store->delete();
        return redirect()->route('vendor.store.manage')->with('success', 'Store deleted successfully');
    }
}
