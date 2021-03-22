@extends('layouts.app')

@section('page_title')
    @if (isset($page_title))
        {{ $page_title.' | ' }}
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Posts</h1>
        </div>
        <div class="col-md-4">
            <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary">New post</a>
        </div>
    </div>
    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            <div class="post">
                <a href="{{ route('posts.show', $post->id) }}" class="post-link">
                    <h3 class="title">{{ $post->title }}</h3>
                </a>
                <div class="post-data">Created at {{ date('d D M, Y', strtotime($post->created_at)) }}</div>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        Coming soon!
    @endif
@endsection