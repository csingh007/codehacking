@extends('layouts.admin')


@section('content')
    <h1>Users</h1>

    <table class="table">
      <tr>
        <th>ID</th>
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
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
          <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
          <td>{{$user->role->name}}</td>
          <td>{{$user->created_at}}</td>
          <td>{{$user->updated_at}}</td>
      </tr>
          @endforeach

      @endif
    </table>

@stop