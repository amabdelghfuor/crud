@extends('layouts.app')

@section('content')

@php
    $i = 1 ;
@endphp

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-ms-12">
            <div class="jumbotron">
                <h1 class="display-4">All Tags</h1>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="{{route('tag.create')}}" role="button">Add Tag</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-ms-12">
        @if(count($tags)>0)
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tage</th>
                        <th scope="col">User</th>
                        <th scope="col">Acton</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $item)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$item->tag}}</td>
                            <td>{{$item->User->name}}</td>
                            <td>
                            <a href="{{route('tag.edit',['id'=>$item->id])}}" class="text-success"><i class="far fa-2x fa-edit"></i></a>
                            <a href="{{route('tag.destroy',['id'=>$item->id])}}" class="text-danger"><i class="far fa-2x fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <div class="alert alert-dark text-center" role="alert">
            No Tags
        </div>

        @endif

        </div>
    </div>
</div>


@endsection