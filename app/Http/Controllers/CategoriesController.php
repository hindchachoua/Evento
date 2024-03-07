<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categories;

class CategoriesController extends Controller
{
    public function index(){

        $categories = categories::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'name_category' => 'required',
        ]);

        $category = new categories();
        $category->name = $request->name_category;
        $category->save();
        return redirect('/categories.store');
    }

    public function edit($id){
        $category = categories::findOrFail($id);
        return view('admin.categories.edit')->with('category', $category);
    }

    public function update(Request $request, $id){
        $category = categories::findOrFail($id);
        $category->update([
            'name' => $request->input('name'),

        ]);
    
        return redirect()->route('admin.categories.edit', $category->id)->with('success', 'Category updated successfully');
    }


    public function destroy(Request $request, $id){
        $category = categories::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }
}
