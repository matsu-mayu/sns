@extends('layouts.logged_in')

@section('content')
<h1>{{ $title }}</h1>
    <ul>
        <li>
            <div>
                {{ $user->name }}さん
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
                    <input type="submit" value="フォロー">
                  </form>
                @endif
            </div>
        </li>
    </ul>
@endsection