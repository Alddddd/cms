@extends('layout.app')

@section('content')

    <h1>Create Post</h1>

    <form method="POST" action="/posts">
        @csrf

        <input type="text" name="title" placeholder="Enter Title">
        <input type="submit" value="Submit">

    </form>

@endsection
