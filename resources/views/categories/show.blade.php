@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
    <div class="col-lg-12 col-md-12 col-ms-12">
            <div class="jumbotron">
            <a class="btn btn-primary btn-lg" href="{{route('categories')}}" role="button"> All Categories</a>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-ms-12 d-flex justify-content-center">
            
            <div class="card" style="width: 100%;">
            <img src="{{URL::asset($category->photo)}}" alt="{{$category->photo}}" class="img-thumbnail" width="50%" style="margin: 10px auto;" >
                <div class="card-body" style="margin: 10px auto;width: 100%;">
                            
                    <h5 class="card-title">{{$category->title}}</h5>
                    <p class="card-text">type is category</p>
                    <p class="card-text">name of user : {{$category->User->name}}</p>
                    <p class="card-text">Created_at : {{$category->created_at->diffForHumans()}}</p>
                    <p class="card-text">Updated_at : {{$category->updated_at->diffForHumans()}}</p>
                    <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn text-success"><i class="far fa-3x fa-edit"></i></a>

                </div>
            </div>
                
        </div>
    
  
</div>
@endsection