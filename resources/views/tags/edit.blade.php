@extends('layouts.app')

@section('content')


<div class="container">

  <div class="row">

        <div class="col-lg-12 col-md-12 col-ms-12">
            <div class="jumbotron">
                <h1 class="display-4">Edit Tags</h1>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="{{route('tags')}}" role="button"> All Tags</a>
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
            <form action="{{route('tag.update',['id'=> $tag->id])}}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tag</label>
                    <input type="text" class="form-control" value="{{$tag->tag}}" name="tag">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save Updating</button>
                </div>
            </form>
        </div>
    
  
</div>
@endsection