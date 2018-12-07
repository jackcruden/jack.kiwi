<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkAPIController extends Controller
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
        $validatedData = $request->validate([
            'name' => 'nullable|max:255|not_in:links,name',
            'url'  => 'required|url|max:2083',
        ]);

        if (! isset($validatedData['name'])) {
            $exists = true;
            $name = str_random(3);
            while ($exists) {
                $name = str_random(3);
                $exists = Link::whereName($name)->first();
            }

            $validatedData['name'] = $name;
        }

        $link = Link::create($validatedData);

        if ($link) {
            return response()->json([
                'message' => 'Link created!',
                'data'    => $link,
            ]);
        } else {
            return response()->json([
                'message' => 'Link not created.',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
