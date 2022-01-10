<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\User;

class FollowController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }
    
    public function index()
    {
        $follow_users = \Auth::user()->follow_users;
        return view('follows.index', [
            'title' => 'フォロー中',
            'follow_users' => $follow_users,
        ]);
    }
    
    public function followEach() {
        $followEach = \Auth::user()->followEach();
        // dd($followEach);
        return view('follows.followeach', [
            'title' => '相互フォロー中',
            'followeach_users' => $followEach,
        ]);
    }
    
    public function store(Request $request)
    {
        $user = \Auth::user();
        Follow::create([
           'user_id' => $user->id,
           'follow_id' => $request->follow_id,
        ]);
        \Session::flash('success', 'フォローしました');
        return redirect()->route('posts.index');
    }
 
    public function destroy($id)
    {
        $follow = \Auth::user()->follows->where('follow_id', $id)->first();
        $follow->delete();
        \Session::flash('success', 'フォロー解除しました');
        return redirect()->route('posts.index');
    }
 
    public function followerIndex()
    {
        $followers = \Auth::user()->followers;
        return view('follows.follower_index', [
          'title' => 'フォロワー一覧',
          'followers' => $followers,
        ]);
    }
    
}
