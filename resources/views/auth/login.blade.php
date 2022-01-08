@extends('layouts.not_logged_in')

@section('content')
    <h1>ログイン</h1>
        <div class="content_center">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label>
                        ユーザー名：
                        <input type="text" name="name">
                    </label>
                </div>
                
                <div>
                    <label>
                        パスワード：
                        <input type="password" name="password">
                    </label>
                </div>
                <input type="submit" value="ログイン">
            </form>
        </div>
@endsection