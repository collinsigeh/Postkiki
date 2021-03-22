@extends('layouts.app')

@section('page_title')
    @if (isset($page_title))
        {{ $page_title.' | ' }}
    @endif
@endsection

@section('content')
    <h1>About</h1>
    <p>Here's some about content.</p>
@endsection