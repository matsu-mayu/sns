<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostEditRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Post::query();
        $search_posts = [];
        
        if($search !== null) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');
            // 単語を半角スペースで区切り、配列にする
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
             // 単語をループで回し、commentと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('comment', 'like', '%'.$value.'%');
            }
        // 上記で取得した$queryを変数$postsに代入
        $search_posts = $query->get();
        
        }
        
        $user = \Auth::user();
        $follow_user_ids = $user->follow_users->pluck('id');
        $user_posts = $user->posts()->orWhereIn('user_id', $follow_user_ids )->latest()->paginate(5);
         // ビューにpostsとsearchを変数として渡す
        return view('posts.index')
            ->with([
            'title' => '投稿一覧',
            'search' => $search,
            'posts' => $user_posts,
            'recommended_users' => User::recommend($user->id, $follow_user_ids)->get(),
            'search_posts' => $search_posts
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
    
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', [
            'title' => '投稿詳細',
            'post' => $post,
        ]);
    }
    
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', [
            'title' => '投稿の編集',
            'post' =>  $post,
        ]);
    }
    
     public function update(Postrequest $request)
    {
        $post = Post::find($id);
        $post->update($request->only(['name', 'comment']));
        session()->flash('success', '投稿を編集しました');
        return redirect()->route('posts.show', $id);
    }
    
    public function destroy($id)
    {
        $post = Post::find($id);
        
        $post->delete();
        \Session::flash('success', '投稿を削除しました');
        return redirect()->route('posts.index', \Auth::user());
    }

}
