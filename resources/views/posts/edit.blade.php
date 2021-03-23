@extends('layouts.app')

@section('page_title')
    @if (isset($page_title))
        {{ $page_title.' | ' }}
    @endif
@endsection

@section('content')
    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-outline-secondary">Back to post view</a>
    <hr />
    <h1>Edit post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Post title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $post->title }}" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="post_body" class="form-label">Post body</label>
            <textarea name="post_body" class="form-control @error('post_body') is-invalid @enderror" id="post_body" rows="3" required>{{ $post->body }}</textarea>
            @error('post_body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection