@extends('layouts.default')

@section('header')
<header>
    <div>
        <ul class="header_nav">
            <li>
                <!-- <a href="{{ route('posts.index') }}">
                    <img class="logo" src="/images/icon.png" alt="icon"> -->
            </li>
            <li><a href="{{ route('posts.index') }}">投稿一覧</a></li>
            <li class="header_left"><a href="{{ route('posts.create') }}">新規投稿</a></li>
            <li class="header_right">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" class="button" value="ログアウト">
                </form>
            </li>
        </ul>
    </div>  
</header>
@endsection