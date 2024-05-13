<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function post()
    {
        $categories = Category::orderbydesc('id')->get();
        return view('Post.index', compact('categories'));
    }

    public function allpost()
    {
        $posts = Post::where('user_id', '!=', auth()->user()->id)->with(['images', 'category', 'user'])->get();

        return view('Post.post', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function poststore(PostRequest $request)
    {

        $post = Post::create([
            'name' => $request->name,
            'description' => $request->description,
            'color' => $request->color,
            'age' => $request->age,
            'category_id' => $request->breed,
            'user_id' => Auth::user()->id,

        ]);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $imagename = date('now()') . $image->getClientOriginalName();
            $path = public_path() . '/images/PostPicture';

            $image->move($path, $imagename);

            $post->images()->create([
                'image' => $imagename,
            ]);
        }

        return redirect()->back()->with('message', 'Post Added Succesfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
