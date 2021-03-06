@extends('layouts.logged_in')
 
@section('content')
    <h1>{{ $title }}</h1>
    
    <form method="GET" action="{{route('posts.index')}}">
        <input type="search" name="search" placeholder="キーワードを入力" value="@if (isset($search)) {{ $search }} @endif">
        <div>
            <button type="submit">検索</button>
        <button>
            <a href="{{ route('posts.index') }}">
                クリア
            </a>
        </button>
        </div>
    </form>
    
    @if($search !== null)
        <p>検索結果</p>
        @foreach($search_posts as $search_post)
            <a href="{{ route('posts.show', $search_post)}}">
                {{ $search_post->comment }}
            </a>
        @endforeach
    @endif
    
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
      <li>他のユーザーが存在しません。</li>
    @endforelse
      <a href="{{ route('follows.index') }}">フォロー一覧</a>
  </ul>
  
    <ul>
    @forelse($posts as $post)
        <li>
            <div>
                投稿者：{{ $post->user->name }}
            </div>
            
            <div>
                投稿内容：{!! nl2br(e($post->comment)) !!}
            </div>

            <div>
                投稿日時：{{ $post->created_at }}
            </div>
            
        @if($post->user_id === \Auth::user()->id)
            [<a href="{{ route('posts.edit', $post) }}">編集</a>]
            <form method="post" class="delete" action="{{ route('posts.destroy', $post) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="削除">
            </form>
        @endif
        </li>
    @empty
        <li>投稿がありません</li>
    @endforelse
    
    
    
@endsection