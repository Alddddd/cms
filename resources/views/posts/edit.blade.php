@extends('layout.app')

@section('content')

    <h1>Edit Post</h1>

 <form method="POST" action="/posts/{{$post->id}}">


        @csrf

        <input type="hidden" name="_method" value="PUT">

        <input type="text" name="title" placeholder="Enter Title" value="{{ $post->title }}">
        <input type="submit" value="Submit">

    </form>


    <form method = "POST" action="/posts/{{ $post->id }}">

    
        @csrf

    <input type="hidden" name="_method" value="DELETE">

    <input type="submit" value="DELETE">


    </form>


    @endsection