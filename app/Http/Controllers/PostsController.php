<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        $data = array(
            'page_title'    => 'Posts',
            'posts'         => $posts
        );

        return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'post_body' => 'required',
        ]);

        $post = new Post;

        $post->title    = $request->input('title');
        $post->body     = $request->input('post_body');

        $post->save();

        $request->session()->flash('success', 'Post created!');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if(empty($post))
        {
            return redirect()->route('posts.index');
        }

        $data = array(
            'page_title'    => $post->title,
            'post'          => $post
        );

        return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if(empty($post))
        {
            return redirect()->route('posts.index');
        }

        $data = array(
            'page_title'    => 'Edit post',
            'post'          => $post
        );

        return view('posts.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if(empty($post))
        {
            return redirect()->route('posts.index');
        }

        $validated = $request->validate([
            'title' => ['required', Rule::unique('posts')->ignore($post->id), 'max:255'],
            'post_body' => ['required'],
        ]);

        $post->title    = $request->input('title');
        $post->body     = $request->input('post_body');

        $post->save();

        $request->session()->flash('success', 'Update saved!');

        return redirect()->route('posts.edit', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);

        if(empty($post))
        {
            return redirect()->route('posts.index');
        }

        $post->delete();

        $request->session()->flash('success', 'Post deleted!');

        return redirect()->route('posts.index');
    }
}
