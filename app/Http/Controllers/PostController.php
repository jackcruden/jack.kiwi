<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostType;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postQuery = Post::query();
        $title = null;

        if (request()->routeIs('projects.index')) {
            $postQuery->whereType(PostType::Project);
            $title = 'Projects';
        } elseif (request()->routeIs('sketches.index')) {
            $postQuery->whereType(PostType::Sketch);
            $title = 'Sketches';
        } elseif (request()->routeIs('blog.index')) {
            $postQuery->whereType(PostType::Blog);
            $title = 'Blog';
        }

        $posts = $postQuery->with('tags')->get();

        return view('posts.index', compact('posts', 'title'));
    }

    /**
     * Show a form to create the resource.
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
