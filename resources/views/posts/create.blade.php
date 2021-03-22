@extends('layouts.app')

@section('page_title')
    @if (isset($page_title))
        {{ $page_title.' | ' }}
    @endif
@endsection

@section('content')
    <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-secondary">All posts</a>
    <hr />
    <h1>New post</h1>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Post title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="post_body" class="form-label">Post body</label>
            <textarea name="post_body" class="form-control @error('post_body') is-invalid @enderror" id="post_body" rows="3" required>{{ old('post_body') }}</textarea>
            @error('post_body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection