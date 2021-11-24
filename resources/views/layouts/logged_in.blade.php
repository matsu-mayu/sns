@extends('layouts.default')

@section('header')
<header>
    <ul class="header_nav">
        <li>マイクロブログ</li>
        <li><a href="{{ route('posts.index') }}">投稿一覧</a></li>
        <li class="header_left"><a href="{{ route('posts.create') }}">新規投稿</a></li>
        <li class="header_right">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" value="ログアウト">
            </form>
        </li>
    </ul>
</header>
@endsection