<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|unique:categories|max:20',
            'module'=>'required|max:20',
        ]);
        if($request->hasFile('image')){
            $image=$request->file('image');
            $nombre = time().$image->getClientOriginalName();
            $ruta = public_path().'/images';
            $image->move($ruta,$nombre);
            $urlimage['url']='/images/'.$nombre;
        }
        $category = new Category;
        $category->name = e($request->name);
        $category->module = e($request->module);
        $category->slug = Str::slug($request->name);
        $category->icon = e($request->icon);
        $category->front = e($request->front);
        $category->save();
        if ($request->hasFile('image')){
            $category->image()->create($urlimage);
        }
        return redirect()->route('categories.index')->with('info','Agregado correctamente');
    }
    public function module($module)
    {
        $categories = Category::where('module',$module)->orderBy('id','DESC')->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }
    public function show(Category $category)
    {
        //
    }
    public function edit($id)
    {
        $category = Category::where('id',$id)->firstOrFail();
        return view('admin.categories.edit',compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:20',
            'module'=>'required|max:20',
        ]);
        if($request->hasFile('image')){
            $image=$request->file('image');
            $nombre = time().$image->getClientOriginalName();
            $ruta = public_path().'/images';
            $image->move($ruta,$nombre);
            $urlimage['url']='/images/'.$nombre;
        }
        $category = Category::findOrFail($id);
        $category->name = e($request->name);
        $category->module = e($request->module);
        $category->slug = Str::slug($request->name);
        $category->icon = e($request->icon);
        $category->front = e($request->front);
        if ($request->hasFile('image')){
            $category->image()->delete();
        }
        $category->save();
        if ($request->hasFile('image')){
            $category->image()->create($urlimage);
        }
        return redirect()->route('categories.index')->with('info','Actualizado correctamente');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();
        return back()->with('info','Borrado con éxito');
    }
}
