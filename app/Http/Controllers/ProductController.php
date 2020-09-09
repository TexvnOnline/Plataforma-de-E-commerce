<?php

namespace App\Http\Controllers;

use App\Product;
use App\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products = Product::orderBy('id','DESC')->paginate(15);
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $subcategories = Subcategory::orderBy('name','ASC')->pluck('name','id');
        return view('admin.products.create', compact('subcategories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'subcategory_id'=>'required',
            'name'=>'required|unique:products|max:60',
            'stock'=>'required',
            'actualPrice'=>'required|numeric',
            'previousPrice'=>'required|numeric',
            'discountRate'=>'required|numeric',
            'shortDescription'=>'required',
            'longDescription'=>'required',
            'state'=>'required',
            'status'=>'required',
        ]);
        $urlimages =[];
        if($request->hasFile('images')){
            $images=$request->file('images');
            foreach ($images as $image) {
                $nombre = time().$image->getClientOriginalName();
                $ruta = public_path().'/images';
                $image->move($ruta,$nombre);
                $urlimages[]['url']='/images/'.$nombre;
            }
        }
        $product = new Product;
        $product->user_id = e($request->user_id);
        $product->subcategory_id = e($request->subcategory_id);
        $product->name = e($request->name);
        $product->slug = Str::slug($request->name);
        $product->stock = e($request->stock);
        $product->actualPrice = e($request->actualPrice);
        $product->previousPrice = e($request->previousPrice);
        $product->discountRate = e($request->discountRate);
        $product->shortDescription = e($request->shortDescription);
        $product->longDescription = e($request->longDescription);
        $product->state = e($request->state);
        $product->status = e($request->status);
        $product->save();
        $product->images()->createMany($urlimages);
        return redirect()->route('products.index')->with('info','Agregado correctamente');
    }
    public function show($id)
    {
        $product = Product::where('id',$id)->with('subcategory.category','user','images','comments.user')->withCount('comments')->firstOrFail();
        return view('admin.products.show',compact('product'));
    }
    public function edit($id)
    {
        $product = Product::where('id',$id)->firstOrFail();
        $subcategories = Subcategory::orderBy('name','ASC')->pluck('name','id');
        return view('admin.products.edit',compact('product','subcategories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'=>'required',
            'subcategory_id'=>'required',
            'name'=>'required|max:60',
            'stock'=>'required',
            'actualPrice'=>'required|numeric',
            'previousPrice'=>'required|numeric',
            'discountRate'=>'required|numeric',
            'shortDescription'=>'required',
            'longDescription'=>'required',
            'state'=>'required',
            'status'=>'required',
        ]);

        $urlimages = [];
        if($request->hasFile('images')){
            $images=$request->file('images');
            foreach ($images as $image) {
                $nombre = time().$image->getClientOriginalName();
                $ruta = public_path().'/images';
                $image->move($ruta,$nombre);
                $urlimages[]['url']='/images/'.$nombre;
            }
        }

        $product = Product::findOrFail($id);


        $product->user_id = e($request->user_id);
        $product->subcategory_id = e($request->subcategory_id);
        $product->name = e($request->name);
        $product->slug = Str::slug($request->name);
        $product->stock = e($request->stock);
        $product->actualPrice = e($request->actualPrice);
        $product->previousPrice = e($request->previousPrice);
        $product->discountRate = e($request->discountRate);
        $product->shortDescription = e($request->shortDescription);
        $product->longDescription = e($request->longDescription);
        $product->state = e($request->state);
        $product->status = e($request->status);
        $product->save();
        if ($request->hasFile('images')){
            $product->images()->createMany($urlimages);
        }
        return redirect()->route('products.index')->with('info','Actualizado correctamente');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete();
        return back()->with('info','Borrado con éxito');
    }
}
