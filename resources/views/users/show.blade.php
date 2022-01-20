@extends('layouts.logged_in')

@section('content')
<h1>{{ $title }}</h1>
  <main>
    <div class="content_center">
      <article>
        <p class="user_name">{{ $user->name }}さん</p>
          <ul>
            @foreach($user->posts as $post)
              <li class="posts_border">
                <div class="posts_sub">
                  ＜投稿内容＞
                  <p class="posts_sub">{{ $post->comment }}</p>
                </div>
                <p class="posts_sub">投稿日時：{{ $post->created_at }}</p>
              </li>
            @endforeach
          </ul>
            <div>
            @if(Auth::user()->isFollowing($user))
              <form method="post" action="{{route('follows.destroy', $user)}}" class="follow">
                @csrf
                @method('delete')
                  <input type="submit" class="button" value="フォロー解除">
              </form>
            @else
              <form method="post" action="{{route('follows.store')}}" class="follow">
                @csrf
                  <input type="hidden" name="follow_id" value="{{ $user->id }}">
                  <input type="submit" class="button follow_button" value="フォロー">
              </form>
            @endif
          </div>
      </article>
      <section>
        <div class="login_button">
          [<a href="{{ route('posts.index') }}">トップへ戻る</a>]
        </div>
      </section>
    </div>
  </main>
@endsection