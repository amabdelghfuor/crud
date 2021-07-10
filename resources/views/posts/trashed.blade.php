@extends('layouts.app')

@section('content')

@php
    $i = 1 ;
@endphp

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-ms-12">
            <div class="jumbotron">
                <h1 class="display-4">Trashed Post</h1>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="{{route('posts')}}" role="button"> All Posts</a>
                <a class="btn btn-warning btn-lg" href="{{route('posts.trashed')}}" role="button">Trashed</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-ms-12">
        @if(count($posts)>0)
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">User</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Acton</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $item)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$item->title}}</td>
                            <td class="wrap" width="400">{{$item->content}}</td>
                            <td>{{$item->User->name}}</td>
                            <td>
                                <img src="{{URL::asset($item->photo)}}" alt="{{$item->photo}}" class="img-thumbnail" width="150" >
                            </td>
                            <td>
                            <a href="{{route('post.hdelete',['id'=>$item->id])}}" class="text-danger"><i class="far fa-2x fa-trash-alt"></i></a>
                            <a href="{{route('post.restore',['id'=>$item->id])}}" class="text-warning ml-2"><i class="fas fa-2x fa-trash-restore-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <div class="alert alert-dark text-center" role="alert">
            No Posts was Trashed
        </div>

        @endif

        </div>
    </div>
</div>


@endsection