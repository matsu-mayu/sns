@extends('layouts.logged_in')
 
@section('content')
  <h1>{{ $title }}</h1>
    <main>
      <ul class="Index content_center">
          @forelse($followeach_users as $follow_user)
              <li class="posts_border foolowed_width">
                <p class="user_name">{{ $follow_user->name }}さん</p> 
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
    </main>
@endsection