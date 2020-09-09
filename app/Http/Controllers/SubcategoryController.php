<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::orderBy('id','DESC')->paginate(15);
        return view('admin.subcategories.index', compact('subcategories'));
    }
    public function create()
    {
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        return view('admin.subcategories.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:subcategories|max:20',
        ]);
        $subcategory = new Subcategory;
        $subcategory->category_id = e($request->category_id);
        $subcategory->name = e($request->name);
        $subcategory->slug = Str::slug($request->name);
        $subcategory->save();
        return redirect()->route('subcategories.index')->with('info','Agregado correctamente');
    }
    public function show(Subcategory $subcategory)
    {
        //
    }
    public function edit($id)
    {
        $subcategory = Subcategory::where('id',$id)->firstOrFail();
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        return view('admin.subcategories.edit',compact('subcategory','categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:20',
        ]);
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->category_id = e($request->category_id);
        $subcategory->name = e($request->name);
        $subcategory->slug = Str::slug($request->name);
        $subcategory->save();

        return redirect()->route('subcategories.index')->with('info','Actualizado correctamente');
    }
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id)->delete();
        return back()->with('info','Borrado con éxito');
    }
}
