@extends('layouts.app')

@section('content')


<div class="container">

  <div class="row">

        <div class="col-lg-12 col-md-12 col-ms-12">
            <div class="jumbotron">
                <h1 class="display-4">Edit Category</h1>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="{{route('categories')}}" role="button"> All Categories</a>
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
            <form action="{{route('category.update',['id'=> $category->id])}}" method="POST" enctype="multipart/form-data" >
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" class="form-control" value="{{$category->title}}" name="title">
                </div>
                
                <div class="form-group">
                    <img src="{{URL::asset($category->photo)}}" alt="{{$category->photo}}" class="img-thumbnail" width="150" >
                    <label for="exampleFormControlFile1">Photo</label>
                    <input type="file" class="form-control-file" name="photo" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save Updating</button>
                </div>
            </form>
        </div>
    
  
</div>
@endsection