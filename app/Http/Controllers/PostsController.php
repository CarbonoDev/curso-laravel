<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('is_public', '=', 1)
            ->with('author')
            ->orderBy('updated_at', 'desc')
            ->paginate(20);

        return view('posts/index')
            ->withPosts($posts);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myPosts()
    {

        $posts = $this->current_user->posts()->paginate(20);

        return view('posts/index')
            ->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/form')->withPost(new Post());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "title" => "required|max:255",
            "content" => "required",
            "is_public" => "boolean",
            "image" => "image",
        ];

        $messages = [
            "content.required" => trans('posts/validation.content.required'),
        ];

        $this->validate($request, $rules, $messages);

        // guardaar a base de datos
        $post = new Post();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->is_public = $request->get('is_public', false);

        if ($request->hasFile('image')) {
            $post->image = $request->get('image');
        }

        $this->current_user->posts()->save($post);
        

        return redirect()->route('posts.show', [$post->id])->withSuccess('Publicación creada con exito.');

    }

    public function process(Post $post = null, Request $request)
    {
        if ($post->id) {
            return $this->update($request, $post);
        }

        return $this->store($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->authorize($post);
        return view('posts/show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts/form')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize($post);

        $rules = [
            "title" => "required|max:255",
            "content" => "required",
            "is_public" => "boolean",
            "image" => "image",
        ];

        $messages = [
            "content.required" => trans('posts/validation.content.required'),
        ];

        $this->validate($request, $rules, $messages);


        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->is_public = $request->get('is_public', false);
        
        if ($request->hasFile('image')) {
            $post->image = $request->file('image');
        }

        $post->save();

        return redirect()->route('posts.show', [$post->id])->withSuccess('Publicación actualizada con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize($post);

        $post->delete();
        
        return redirect()->route('posts.index')->withSuccess('Publicación borrado!');
    }
}
