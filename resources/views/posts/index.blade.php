@extends('layouts.logged_in')
 
@section('content')
    <h1>{{ $title }}</h1>
    <div class="Index">
        <form method="GET" action="{{route('posts.index')}}" class="search_box">
            <input 
                type="search"
                name="search"
                placeholder="キーワードを入力"
                value="@if (isset($search)) {{ $search }} @endif"
                class="placeholder"
            >
                <button type="submit" class="button">検索</button>
        </form>
    
        @if($search !== null)
            <p>検索結果</p>
            @foreach($search_posts as $search_post)
                <a href="{{ route('posts.show', $search_post)}}">
                    {{ $search_post->comment }}
                </a>
            @endforeach
        @endif
    </div>

    <div>
        <ul class="recommend_users">
            @forelse($recommended_users as $recommended_user)
                <li>
                    <a href="{{ route('users.show', $recommended_user) }}">{{ $recommended_user->name }}</a>
                    <form method="post" action="{{route('follows.store')}}" class="follow">
                        @csrf
                        <input type="hidden" name="follow_id" value="{{ $recommended_user->id }}">
                        <input type="submit" value="フォロー">
                    </form>
                </li>
            @empty
                <li>他のユーザーが存在しません</li>
            @endforelse
                <a href="{{ route('follows.index') }}">フォローしているユーザー</a>
        </ul>
    </div>
  
    <div class="content_center">
        <ul>
            @forelse($posts as $post)
                <li class="posts_border">
                    <div>投稿者：{{ $post->user->name }}</div>
                    <div>投稿内容：{!! nl2br(e($post->comment)) !!}</div>
                    <div>投稿日時：{{ $post->created_at }}</div>
                    <div class="Index center">
                        @if($post->user_id === \Auth::user()->id)
                            [<a href="{{ route('posts.edit', $post) }}">編集</a>]
                            <form method="post" class="delete" action="{{ route('posts.destroy', $post) }}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="button" value="削除">
                            </form>
                        @endif
                    </div>
                </li>
            @empty
                <li>投稿がありません</li>
            @endforelse
    </div>
@endsection