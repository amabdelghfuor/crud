<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Auth;


class  CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $categories =Category::all();
        return view('categories.index')->with('categories',$categories);
    }
    public function trashed()
    {
        $categories =Category::onlyTrashed()->get();
        return view('categories.trashed')->with('categories',$categories);
    }

    public function create()
    {
        return view('categories.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'photo'=>'required',
        ]);
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalExtension();
        $photo->move('uplouds/categories',$newPhoto);
        
        $id = Auth::id();

        $category = Category::create([
            'title'=> $request->title,
            'photo'=> 'uplouds/categories/'.$newPhoto,
            'slug'=> str_slug($request->title),
            'user_id' => $id
        ]);
        return redirect()->back();
    }

   
    public function show($slug)
    {
        $category = Category::where('slug',$slug)->first();
        return view('categories.show')->with('category',$category);
    
    }

    
    public function edit($id)
    {

        $category = Category::find($id);
        return view('categories.edit')->with('category',$category);
        
    }

    
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $this->validate($request,[
            'title'=>'required',
        ]);

        if ($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOriginalExtension();
            $photo->move('uplouds/categories',$newPhoto);
            $category->photo='uplouds/categories/'.$newPhoto;
            $category->save();
        }

        $category->title = $request->title ;
        $category->save();        
        return redirect()->back();
    }

    
    public function destroy($id)
    {
        $category =Category::find($id);
        $category->delete();
        return redirect()->back();
    }
    public function hdelete( $id )
    {
        $category = Category::withTrashed()->where('id',$id)->first();
        $category->forceDelete();
        return redirect()->back();
    }
    public function restore( $id )
    {
        $category = Category::withTrashed()->where('id',$id)->first();
        $category->restore();
        return redirect()->back();
    }
}
