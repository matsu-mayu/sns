@extends('layouts.logged_in')

@section('content')
<h1>{{ $title }}</h1>
  <main>
    <ul class="Index content_center">
        <li class="posts_border followed_width">
            <div>
                <p class="user_name">{{ $user->name }}さん</p>
                  @if(Auth::user()->isFollowing($user))
                    <form method="post" action="{{route('follows.destroy', $user)}}" class="follow">
                      @csrf
                      @method('delete')
                      <input type="submit" value="フォロー解除">
                    </form>
                  @else
                    <form method="post" action="{{route('follows.store')}}" class="follow">
                      @csrf
                      <input type="hidden" name="follow_id" value="{{ $user->id }}">
                      <input type="submit" class="button follow_button" value="フォロー">
                    </form>
                  @endif
            </div>
        </li>
    </ul>
  </main>
@endsection