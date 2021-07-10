<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Auth;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $tags =Tag::all();
        return view('tags.index')->with('tags',$tags);
    }

  
    public function create()
    {
        return view('tags.create');  
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'tag'=>'required'
        ]);
        $id = Auth::id();

        $tag = Tag::create([
            'tag'=> $request->tag,
            'user_id'=> $id
        ]);
        return redirect()->back();
    }

    
    public function show(Tag $tag)
    {
        //
    }

    
    public function edit($id)
    {
        $tag =Tag::find($id);
        return view('tags.edit')->with('tag',$tag);   
    }

    
    public function update(Request $request, $id)
    {
        $tag =Tag::find($id);
        $this->validate($request,[
            'tag'=>'required',    
        ]);
        $tag->tag = $request->tag;
        $tag->save();
        return redirect()->back();
    }

    
    public function destroy($id)
    {
        $tag =Tag::find($id);
        $tag->destroy($id);
        return redirect()->back();
    }
}
