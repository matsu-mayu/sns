@extends('layouts.logged_in')
 
@section('content')
  <h1>{{ $title }}</h1>
    <main class="content_center">
      <article>
        <ul class="Index">
          @forelse($follow_users as $follow_user)
            <li class="followed_width posts_border">
              <a href="{{ route('users.show', $follow_user) }}">{{ $follow_user->name }}さん</a>
                <form method="post" action="{{route('follows.destroy', $follow_user)}}" class="follow">
                  @csrf
                  @method('delete')
                  <input type="submit" class="button follow_button" value="フォロー解除">
                </form>
            </li>
          @empty
            <li class="no_posts">フォローしているユーザーはいません</li>
          @endforelse
        </ul>
      </article>
    </main>
    <section class="content_center">
      <div class="login_button">
        [<a href="{{ route('posts.index') }}">トップへ戻る</a>]
      </div>
    </section>
@endsection