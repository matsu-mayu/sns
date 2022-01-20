@extends('layouts.logged_in')
 
@section('content')
  <h1>{{ $title }}</h1>
    <main>
      <ul class="Index content_center">
          @forelse($follow_users as $follow_user)
              <li class="posts_border followed_width">
              <a href="{{ route('users.show', $follow_user) }}">{{ $follow_user->name }}さん</a>                  <form method="post" action="{{route('follows.destroy', $follow_user)}}" class="follow">
                    @csrf
                    @method('delete')
                      <input type="submit" class="button follow_button" value="フォロー解除">
                  </form>
              </li>
          @empty
              <li class="no_posts">フォローしているユーザーはいません</li>
          @endforelse
      </ul>
    </main>
@endsection