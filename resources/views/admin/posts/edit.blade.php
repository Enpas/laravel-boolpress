@extends('layouts.app')

@section('content')

<div class="container">

  <a href="{{route('admin.posts.show', $post)}}" class="btn btn-secondary mb-4">Back</a>

  <h1>{{$post->title}}</h1>

  <form action="{{route('admin.posts.update', $post)}}" method="POST">

    @method('patch')
    @csrf

    <div class="mb-3">
      <label for="title" class="label-control">Title:</label>
      <input type="text" name="title" id="title" value="{{$post->title}}" class="form-control">
    </div>

    <div class="mb-3">
      <label for="content" class="label-control">Content:</label>
      <textarea name="content" id="content" rows="4" class="form-control">{{$post->content}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">SUBMIT</button>

  </form>
  
</div>
  
@endsection