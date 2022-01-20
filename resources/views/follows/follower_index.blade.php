@extends('layouts.logged_in')
 
@section('content')
  <h1>{{ $title }}</h1>
    <main>
      <ul class="Index content_center">
          @forelse($followers as $follower)
              <li class="posts_border followed_width">
                <a href="{{ route('users.show', $follower) }}">{{ $follower->name }}さん</a>                @if(Auth::user()->isFollowing($follower))
                  <form method="post" action="{{route('follows.destroy', $follower)}}" class="follow">
                    @csrf
                    @method('delete')
                    <input type="submit" class="button follow_button" value="フォロー解除">
                  </form>
                @else
                  <form method="post" action="{{route('follows.store')}}" class="follow">
                    @csrf
                    <input type="hidden" name="follow_id" value="{{ $follower->id }}">
                    <input type="submit" value="フォロー">
                  </form>
                @endif
              </li>
          @empty
              <li class="no_posts">フォローされているユーザーはいません。</li>
          @endforelse
      </ul>
    </main>
@endsection