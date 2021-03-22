@extends('layouts.app')

@section('page_title')
    @if (isset($page_title))
        {{ $page_title.' | ' }}
    @endif
@endsection

@section('content')
    <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-secondary">All posts</a>
    <hr />
    <h1>{{ $post->title }}</h1>
    <div class="post-body">{{ $post->body }}</div>
    <div class="post-data">Created at {{ date('d D M, Y', strtotime($post->created_at)) }}</div>
@endsection