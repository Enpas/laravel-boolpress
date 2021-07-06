@extends('layouts.app')

@section('content')

  <div class="container">

    <a href="{{route('admin.posts.index')}}" class="btn btn-secondary mb-4">Back</a>

    <h1>Create a new post</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
  
    <form action="{{route('admin.posts.store')}}" method="POST">

      @method('post')
      @csrf

      <div class="mb-3">
        <label for="title" class="label-control">Title:</label>
        <input 
          class="form-control @error('title') is-invalid @enderror " type="text" name="title" id="title"
          value="{{old('title')}}"
          >
          @error('title')
            <div class="text-danger">{{$message}}</div>
          @enderror
      </div>

      <div class="mb-3">
        <label for="category_id" class="label-control">Category:</label>
        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
          <option value="">Select a category</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
        @error('category_id')
        <span class="invalid-feedback">{{$message}}</span>
      @enderror
      </div>

      <div class="mb-3">
        <h6>Tag:</h6>
        @foreach ($tags as $tag)
          <span class="d-inline-block mr-3">
            <input type="checkbox"
              id="tag{{$loop->iteration}}"
              value="{{$tag->id}}"
              name="tags[]"
              @if (in_array($tag->id, old('tags', []))) checked @endif
            >
            <label for="tag{{$loop->iteration}}">{{$tag->name}}</label>
          </span>
        @endforeach
        @error('tags')
          <span class="invalid-feedback">{{$message}}</span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="content" class="label-control">Content:</label>
        <textarea class="form-control @error('content') is-invalid @enderror" type="text" name="content" id="content" rows="5">{{old('content')}}</textarea>
          @error('content')
            <div class="text-danger">{{$message}}</div>
          @enderror
      </div>

      <button type="submit" class="btn btn-primary">SUBMIT</button>
      <button type="reset" class="btn btn-danger mx-3">RESET</button>
      
    </form>

  </div>

  
@endsection