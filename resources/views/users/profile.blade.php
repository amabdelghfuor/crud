@extends('layouts.app')

@section('content')



<div class="container ">
    @if(count($errors)>0)
        @foreach($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{$item}}
            </div>
        @endforeach
    @endif
        <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @php
        $genderArray=['male','female'];
    @endphp
        <div class="form-group">
            <img src="{{URL::asset($user->profile->photo)}}" alt="{{$user->profile->photo}}" class="img-thumbnail" width="150" >
            <br/>
            <label for="exampleFormControlFile1">Photo</label>
            <input type="file" class="form-control-file" name="photo" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email Adress</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">New Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Old Password</label>
            <input type="password" class="form-control" name="c_password">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">City</label>
            <input type="text" class="form-control" name="city" value="{{$user->profile->city}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email facebook</label>
            <input type="text" class="form-control" name="facebook" value="{{$user->profile->facebook}}">
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlSelect2">Gender</label>
            <select  class="form-control" name="gender">
            @foreach($genderArray as $item)
                <option value= "{{$item}}" {{($user->profile->gender == $item) ?'selected': $item }}>{{$item}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Bio</label>
            <textarea class="form-control" name="bio" rows="3">{{$user->profile->bio}}</textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>
</div>




@endsection
