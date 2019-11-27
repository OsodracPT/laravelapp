@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-default">Go back</a>
<h1>{{$post->title}}</h1>
<div>
    {{$post->body}}
</div>
<hr>
<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
<hr>
    @if (!Auth::guest())
    @endif
    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-rigth'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
    @if (Auth::user()->id == $post->user_id)
@endsection