@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
    <main>
      <div class="posts_border posts_width margin edit_form">
        <p class="posts_sub">投稿者：{{ $post->user->name }}</p>
        <p class="posts_sub">投稿内容：{{ $post->comment }}</p>
        <p class="posts_sub">投稿日時：{{ $post->created_at }}</p>
      </div>

      <div class="content_center backTop_button">
        [<a href="{{ route('posts.index') }}">トップへ戻る</a>]
      </div>
    </main>
@endsection