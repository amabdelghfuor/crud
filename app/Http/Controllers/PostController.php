<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Auth;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $posts =Post::all();
        return view('posts.index')->with('posts',$posts);
    }
    public function trashed()
    {
        $posts =Post::onlyTrashed()->get();
        return view('posts.trashed')->with('posts',$posts);
    }

    
    public function create()
    {
        $category = Category::all();
        $tags = Tag::all();
        if ($tags->count()==0) {
            return view('tags.create');
        }elseif ($category->count()==0) {
            return view('categories.create');
        }
        return view('posts.create')->with('category',$category)->with('tags',$tags);   
    }

    
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'=>'required',        
            'content'=>'required',    
            'photo'=>'required|image',
            'category_id'=>'required',
            'tags'=>'required' 

        ]);
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalExtension();
        $photo->move('uplouds/posts',$newPhoto);
        
        $id = Auth::id();
        $post = Post::create([
            'title'=> $request->title ,
            'slug'=> str_slug($request->title) ,
            'content' =>$request->content ,
            'photo'=> 'uplouds/posts/'.$newPhoto,
            'user_id' => $id,
            'category_id' => $request->category_id
        ]);
        $post->tags()->attach($request->tags);

        return redirect()->back();  
    }

    
    public function show($slug)
    {

        $post =Post::where('slug',$slug)->first();
        return view('posts.show')->with('post',$post);
    }

    // ///////////////
    public function edit( $id)
    {
        $post =Post::find($id);
        $tags =Tag::all();
        $category = Category::all();

        return view('posts.edit',compact('category'))->with('post',$post)->with('category',$category)->with('tags',$tags);   
    }

    
    public function update(Request $request, $id)
    {
        $post =Post::find($id);
        $this->validate($request,[
            'title'=>'required',        
            'content'=>'required', 
            'category_id'=>'required',    
        ]);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOriginalExtension();
            $photo->move('uplouds/posts',$newPhoto);
            $post->photo='uplouds/posts/'.$newPhoto;
            $post->save();
        }
        $post->title = $request->title ;
        $post->content = $request->content ;
        $post->category_id = $request->category_id ;
        $post->save();
        $post->tags()->sync($request->tags);
        return redirect()->back();
        
    }

    // //////////////////////
    public function destroy( $id )
    {
        $post =Post::find($id);
        $post->delete();
        return redirect()->back();

    }
    public function hdelete( $id )
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back();
    }
    public function restore( $id )
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->back();
    }
}
