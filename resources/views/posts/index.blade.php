@extends('layouts.logged_in')
 
@section('content')
    <h1>{{ $title }}</h1>
        <article>
            <section>
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
            </section>
            <section>
                @if($search !== null)
                    <p class="user_name content_center">検索結果</p>
                        <ul>
                            @forelse($search_posts as $search_post)
                                <li class="posts_border margin">
                                    <div class="posts_sub">
                                        ＜投稿内容＞
                                        <a href="{{ route('posts.show', $search_post)}}">{{ $search_post->comment }}</a>
                                    </div>
                                </li>
                            @empty
                                <li class="content_center">該当する投稿はありません。</li>
                            @endforelse
                        </ul>
                @endif
            </section>
        </article>
    <main>
        <article class="content_center">
            <ul>
                @forelse($posts as $post)
                    <li class="posts_border posts_width margin">
                        <p class="posts_sub">投稿者：{{ $post->user->name }}</p>
                            <div class="posts_sub">
                                ＜投稿内容＞<p class="posts_sub">{{ $post->comment }}</p>
                            </div>
                        <p class="posts_sub">投稿日時：{{ $post->created_at }}</p>
                            <div class="Index center">
                                @if($post->user_id === \Auth::user()->id)
                                    [<a href="{{ route('posts.edit', $post) }}">編集</a>]
                                        <form method="post" class="delete" action="{{ route('posts.destroy', $post) }}">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="button delete_button" value="削除">
                                @endif
                            </div>
                    </li>
                @empty
                    <li class="no_posts">投稿がありません</li>
                @endforelse
            </ul>  
        </article>
    </main>
        <article class="content_center">
            <h2>オススメのユーザー</h2>
                <section>        
                    <ul class="Index">
                        @forelse($recommended_users as $recommended_user)
                            <li class="followed_width posts_border">
                                <a href="{{ route('users.show', $recommended_user) }}">{{ $recommended_user->name }}さん</a>
                                <form method="post" action="{{ route('follows.store') }}" class="follow">
                                    @csrf
                                    <input type="hidden" name="follow_id" value="{{ $recommended_user->id }}">
                                    <input type="submit" class="button follow_button" value="フォローする">
                                </form>
                            </li>
                        @empty
                            <li class="no_posts">他のユーザーが存在しません</li>
                        @endforelse
                    </ul>
                </section>
                <section>
                    <div class="Index followed">
                        <p><a href="{{ route('follows.index') }}">フォローしているユーザー</a></p>
                        <p class="space_p">／</p>
                        <p><a href="{{ route('follower.index') }}">フォローされているユーザー</a></p>
                        <p class="space_p">／</p>
                        <p><a href="{{ route('followeach.index') }}">相互フォローしているユーザー</a></p>
                    </div>
                </section>
        </article>
@endsection