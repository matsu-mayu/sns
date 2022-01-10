@extends('layouts.not_logged_in')

@section('content')
<div class="content_center">
    <h1>ログイン</h1>
        <div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label class="login_label">
                        ユーザー名：
                        <input type="text" name="name">
                    </label>
                </div>
                
                <div>
                    <label class="login_label">
                        パスワード：
                        <input type="password" name="password">
                    </label>
                </div>
                <input type="submit" class="login_button button" value="ログイン">
            </form>
        </div>
</div>
@endsection