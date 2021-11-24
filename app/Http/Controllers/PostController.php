<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = \Auth::user();
        $posts = $user->posts;
        return view('posts.index', [
            'title' => '投稿一覧',
            'posts' => \Auth::user()->posts()->latest()->get(),
        ]);
    }
    
    public function create()
    {
        return view('posts.create', [
            'title' => '投稿を追加',
        ]);
    }
    
    public function store(PostRequest $request)
    {
        Post::create([
            'user_id' => \Auth::user()->id,
            'comment' => $request->comment,
        ]);
        session()->flash('success', '投稿を追加しました');
        return redirect()->route('posts.index', \Auth::user());
    }
    
    public function edit($id)
    {
        $post = Post::find($id);
        
        return view('posts.edit', [
            'title' => '投稿の編集',
            'post' => $post,
        ]);
    }
    
     public function update(Postrequest $request)
    {
        $post = Post::find($id);
        $post->update($request->only(['name', 'comment']));
        session()->flash('success', '投稿を編集しました');
        return redirect()->route('items.show', $id);
    }
    
    public function destroy($id)
    {
        $post = Post::find($id);
        
        $post>delete();
        \Session::flash('sucdess', '投稿を削除しました');
        return redirect()->route('posts.index', \Auth::user());
    }

}
