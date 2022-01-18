@extends('layouts.not_logged_in')

@section('content')
<h1 class="content_center">ユーザー登録</h1>
    <main class="content_center">
        <article>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <section>
                    <label class="login_label"> 
                        ユーザー名：<input type="text" name="name">
                    </label>
                </section>
                
                <section>
                    <label class="login_label">
                        パスワード：<input type="password" name="password">
                    </label>
                </section>
                
                <section>
                    <label class="login_label">
                        パスワード（確認用）：<input type="password" name="password_confirmation">
                    </label>
                </section>
                
                <section>
                    <input type="submit" class="login_button button" value="登録">
                </section>
            </form>
        </article>
    </main>
@endsection