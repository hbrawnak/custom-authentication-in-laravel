@extends('layouts.master')
@section('content')
<form action="/posts" method="post">
    {{ csrf_field() }}

    <input type="text" name="title" placeholder="Title">
    <input type="submit" value="Post">
</form>
@endsection
