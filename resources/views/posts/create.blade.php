@extends('layouts.app')

@section('content')


<div class="container">

  <div class="row">

        <div class="col-lg-12 col-md-12 col-ms-12">
            <div class="jumbotron">
                <h1 class="display-4">Create Post</h1>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="{{route('posts')}}" role="button"> All Posts</a>
            </div>
        </div>

    </div>
    <div class="row">
    @if(count($errors) > 0 )
        <ul>
            @foreach($errors->all() as $item)
                <div class="alert alert-danger" role="alert">
                    {{$item}}
                </div>
            @endforeach
        </ul>
    @endif
        <div class="col-lg-12 col-md-12 col-ms-12">
            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    @foreach($tags as $item)
                        <input type="checkbox" name="tags[]" value="{{$item->id}}"> 
                        <label class="mr-4">{{$item->tag}}</label>
                    @endforeach                   
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea class="form-control" type="text"  name="content" rows="3" ></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Category</label>
                    <select  class="form-control" name="category_id">
                    @foreach($category as $item)
                        <option value= "{{$item->id}}">{{$item->title}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Photo</label>
                    <input type="file" class="form-control-file" name="photo">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    
  
</div>













@endsection