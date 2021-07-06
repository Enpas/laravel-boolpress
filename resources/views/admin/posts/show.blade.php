@extends('layouts.app')

@section('content')

  <div class="container">

    <a href="{{route('admin.posts.index')}}" class="btn btn-secondary mb-4">Back</a>

    <h1>{{$post->title}}</h1>

    <div class="my-2">
      @foreach ($post->tags as $tag)
        <span class="badge badge-primary">{{$tag->name}}</span>
      @endforeach
    </div>

    @if ($post->category)
      <h3>Category: {{$post->category->name}}</h3>
    @else
      <h3>No category found</h3>
    @endif

    <p>{{$post->content}}</p>

    <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-primary">EDIT</a>
    
  </div>
  
@endsection