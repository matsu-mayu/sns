@extends('layouts.default')

@section('header')
    <header>
        <ul class="header_nav">
            <li>
                <!-- <a href="{{ route('posts.index') }}">
                    <img class="logo" src="/images/icon.png" alt="icon"> -->
            </li>
            <li><a href="{{ route('register') }}">ユーザー登録</a></li>
            <li><a href="{{ route('login') }}">ログイン</a></li>
        </ul>
    </header>
@endsection