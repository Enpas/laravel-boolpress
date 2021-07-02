@extends('layouts.app')

@section('content')

<div class="container">

  <a href="{{route('admin.posts.show', $post)}}" class="btn btn-secondary mb-4">Back</a>

  <h1>{{$post->title}}</h1>

  @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

  <form action="{{route('admin.posts.update', $post)}}" method="POST">

    @method('patch')
    @csrf

    <div class="mb-3">
      <label for="title" class="label-control">Title:</label>
      <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{old('title',$post->title)}}">
          @error('title')
            <div class="text-danger">{{$message}}</div>
          @enderror
    </div>

    <div class="mb-3">
      <label for="content" class="label-control">Content:</label>
      <textarea class="form-control  @error('content') is-invalid @enderror" type="text" name="content" id="content" rows="5">{{old('content',$post->content)}}</textarea>
      @error('content')
        <div class="text-danger">{{$message}}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">SUBMIT</button>

  </form>
  
</div>
  
@endsection