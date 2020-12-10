<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('postAuthor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
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
        $user = auth()->user();
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);
        $post = $user->posts()->create($request->all());

        if($file = $request->file('image')){
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $post->photo()->create([
                'url' => $filename
            ]);
        }

        $request->session()->flash('success', 'Post was created successfully!');
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
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
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
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);
        $post = Post::find($id);
        $post->update([
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        if($file = $request->file('image')) {
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $post->photo()->updateOrCreate([
                'url' => $filename
            ]);
        }

        $request->session()->flash('success', 'Post was updated successfully!');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($photo = $post->photo) {
            File::delete(public_path($photo->url));
            $post->photo()->delete();
        }
        $post->delete();

        Session::flash('danger', 'Post was deleted successfully!');
        return redirect()->route('posts.index');
    }
}
