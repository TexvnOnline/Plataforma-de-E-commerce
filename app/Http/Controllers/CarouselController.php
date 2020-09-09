<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    
    public function index()
    {
        $carousels = Carousel::orderBy('id','DESC')->paginate(15);
        return view('admin.carousels.index', compact('carousels'));
    }
    public function create()
    {
        return view('admin.carousels.create');
    }
    public function store(Request $request)
    { 
        $request->validate([
            'header'=>'required',
            'text'=>'required',
            'excerpt'=>'required',
            'buttonText'=>'required',
            'buttonLink'=>'required',
            'image'=>'required|image|dimensions:min_width=1200, max_width=1200,min_height=490, max_height=490|mimes:jpeg,jpg,png',
        ]);
        if($request->hasFile('image')){
            $image=$request->file('image');
            $nombre = time().$image->getClientOriginalName();
            $ruta = public_path().'/images';
            $image->move($ruta,$nombre);
            $urlimage['url']='/images/'.$nombre;
        }
        $carousel = new Carousel;
        $carousel->header = e($request->header);
        $carousel->text = e($request->text);
        $carousel->excerpt = e($request->excerpt);
        $carousel->buttonText = e($request->buttonText);
        $carousel->buttonLink = e($request->buttonLink);
        $carousel->save();
        $carousel->image()->create($urlimage);
        return redirect()->route('carousels.index')->with('info','Agregado correctamente');
    }
    public function show($id)
    {
        $carousel = Carousel::where('id',$id)->with('image')->firstOrFail();
        return view('admin.carousels.show',compact('carousel'));
    }
    public function edit($id)
    {
        $carousel = Carousel::where('id',$id)->firstOrFail();
        return view('admin.carousels.edit',compact('carousel'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'header'=>'required',
            'text'=>'required',
            'excerpt'=>'required',
            'buttonText'=>'required',
            'buttonLink'=>'required',
        ]);
        if($request->hasFile('image')){
            $image=$request->file('image');
            $nombre = time().$image->getClientOriginalName();
            $ruta = public_path().'/images';
            $image->move($ruta,$nombre);
            $urlimage['url']='/images/'.$nombre;
        }
        $carousel = Carousel::findOrFail($id);
        $carousel->header = e($request->header);
        $carousel->text = e($request->text);
        $carousel->excerpt = e($request->excerpt);
        $carousel->buttonText = e($request->buttonText);
        $carousel->buttonLink = e($request->buttonLink);
        if ($request->hasFile('image')){
            $carousel->image()->delete();
        }
        $carousel->save();
        if ($request->hasFile('image')){
            $carousel->image()->create($urlimage);
        }
        return redirect()->route('carousels.index')->with('info','Actualizado correctamente');
    }
    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id)->delete();
        return back()->with('info','Borrado con éxito');
    }
}
