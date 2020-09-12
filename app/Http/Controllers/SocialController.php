<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::orderBy('id','DESC')->paginate(15);
        return view('admin.socials.index', compact('socials'));
    }
    public function create()
    {
        return view('admin.socials.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:socials|max:20',
            'link'=>'required',
            'icon'=>'required|max:20',
        ]);
        $social = new Social;
        $social->link = e($request->link);
        $social->title = e($request->title);
        $social->icon = e($request->icon);
        $social->save();
        return redirect()->route('socials.index')->with('info','Agregado correctamente');
    }
    public function show(Social $social)
    {
        //
    }
    public function edit($id)
    {
        $social = Social::where('id',$id)->firstOrFail();
        return view('admin.socials.edit',compact('social'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|max:20',
            'link'=>'required',
            'icon'=>'required|max:20',
        ]);
        $social = Social::findOrFail($id);

        $social->link = e($request->link);
        $social->title = e($request->title);
        $social->icon = e($request->icon);
        $social->save();

        return redirect()->route('socials.index')->with('info','Actualizado correctamente');
    }
    public function destroy($id)
    {
        $social = Social::findOrFail($id)->delete();
        return back()->with('info','Borrado con éxito');
    }
}
