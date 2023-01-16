<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }
    public function index(){
        $post = Post::latest()->with('user','likes')->paginate(10);
        return view('posts.index', [
            'posts' => $post
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'body'=>'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post,
        ]);
    }
    public function destroy(Post $post, Request $request){ 
        // if(!$post->ownedBy(auth()->user())){
        //     dd('nope');
        // }
        //using policies
        $this->authorize('delete', $post);
        $post->delete();
        return back(); 
    }


}
