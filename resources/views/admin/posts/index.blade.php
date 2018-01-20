@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_post'))
        <p class="alert bg-danger">{{session('deleted_post')}}</p>

    @endif

    @if(Session::has('msg'))
        <p class="alert bg-info">{{session('msg')}}</p>

    @endif
    <h1>Posts</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>PHOTO</th>
            <th>AUTHOR</th>
            <th>CATEGORY</th>
            <th>POST</th>
            <th>BODY</th>
            <th>CREATED_AT</th>
            <th>UPDATED_AT</th>
        </tr>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img width="100" src="{{$post->photo ? $post->photo->path : 'http://placehold.it/400x400'}}" alt=""></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category_id ? $post->category->name : 'Uncategorised'}}</td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForhumans()}}</td>
                    <td>{{$post->updated_at->diffForhumans()}}</td>
                </tr>
            @endforeach

        @endif
    </table>

@stop

