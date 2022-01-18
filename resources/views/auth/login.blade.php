@extends('layouts.not_logged_in')

@section('content')
<h1 class="content_center">ログイン</h1>
    <main class="content_center">
        <article>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <section>
                    <label class="login_label">
                        ユーザー名：
                        <input type="text" name="name">
                    </label>
                </section>
                <section>
                    <label class="login_label">
                        パスワード：
                        <input type="password" name="password">
                    </label>
                </section>
                <input type="submit" class="login_button button" value="ログイン">
            </form>
        </article>
    </main>
@endsection