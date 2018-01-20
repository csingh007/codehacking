@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_user'))
        <p class="alert bg-danger">{{session('deleted_user')}}</p>

    @endif

    @if(Session::has('msg'))
        <p class="alert bg-info">{{session('msg')}}</p>

    @endif
    <h1>Users</h1>

    <table class="table">
      <tr>
        <th>ID</th>
        <th>PHOTO</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>STATUS</th>
        <th>ROLE</th>
        <th>CREATED_AT</th>
        <th>UPDATED_AT</th>
      </tr>
      @if($users)
          @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td><img width="100" src="{{$user->photo ? $user->photo->path : 'http://placehold.it/400x400'}}" alt=""></td>
        <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
          <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
          <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
          <td>{{$user->created_at->diffForhumans()}}</td>
          <td>{{$user->updated_at->diffForhumans()}}</td>
      </tr>
          @endforeach

      @endif
    </table>

@stop