<?php

namespace App\Http\Controllers;

use App\Post;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate([
            'title'        => 'required|max:120',
            'slug'         => 'nullable',
            'content'      => 'required',
            'is_original'  => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        // if (! isset($validatedData['slug'])) {
        //     $validatedData['slug'] = str_slug($validatedData['title']);
        // } else {
        //     $validatedData['slug'] = str_slug($validatedData['slug']);
        // }

        return Post::create([
            'title'        => $validatedData['title'],
            'slug'         => $validatedData['slug'],
            'content'      => $validatedData['content'],
            'is_original'  => $validatedData['is_original'],
            'published_at' => $validatedData['published_at'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('blog.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
