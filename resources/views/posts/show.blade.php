@extends('layouts.app')

@section('page_title')
    @if (isset($page_title))
        {{ $page_title.' | ' }}
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-secondary">All posts</a>
        </div>
        <div class="col-md-4 collins-right-button">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary">New post</a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary">Edit post</a>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
        
                        <input type="submit" value="Delete post" class="btn btn-sm btn-outline-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <h1>{{ $post->title }}</h1>
    <div class="post-body">{{ $post->body }}</div>
    <div class="post-data">Created at {{ date('d D M, Y', strtotime($post->created_at)) }}</div>
@endsection