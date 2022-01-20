@extends('layouts.not_logged_in')

@section('content')
<main class="content_center">
    <h1>ユーザー登録</h1>
        <article>
            <form method="POST" action="{{ route('register') }}">
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
                
                <div>
                    <label class="login_label">
                        パスワード（確認用）：
                        <input type="password" name="password_confirmation">
                    </label>
                </div>
                
                <div>
                    <input type="submit" class="login_button button" value="登録">
                </div>
            </form>
        </article>
</main>
@endsection