@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
    <div class="col-lg-12 col-md-12 col-ms-12">
            <div class="jumbotron">
            <a class="btn btn-primary btn-lg" href="{{route('posts')}}" role="button"> All Posts</a>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-ms-12 d-flex justify-content-center">
            
            <div class="card" style="width: 100%;">
            <img src="{{URL::asset($post->photo)}}" alt="{{$post->photo}}" class="img-thumbnail" width="50%" style="margin: 10px auto;" >
                <div class="card-body" style="margin: 10px auto;width: 100%;">
                            
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">type is post</p>
                    <p class="card-text">Category : {{$post->Category->title}}</p>
                    <p class="card-text">content : {{$post->content}}</p>
                    
                    <div class="form-group">
                    <label for="exampleFormControlTextarea1">Tags : </label>
                    <br>
                    @foreach($post->tags as $item)
                        <input type="checkbox" name="tags[]" data-plugin="switchery" value="{{$item->id}}"
                            @foreach( $post->tags as $item2 )
                                @if( $item->id == $item2->id)
                                    checked
                                @endif
                            @endforeach
                        > 
                        <label class="mr-4">{{$item->tag}}</label>
                    @endforeach
                </div>
                
                    <p class="card-text">name of user : {{$post->User->name}}</p>
                    <p class="card-text">Created_at : {{$post->created_at->diffForHumans()}}</p>
                    <p class="card-text">Updated_at : {{$post->updated_at->diffForHumans()}}</p>
                    <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn text-success"><i class="far fa-3x fa-edit"></i></a>

                </div>
            </div>
                
        </div>
    
  
</div>
@endsection