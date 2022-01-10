@extends('layouts.logged_in')
 
@section('content')
    <h1>{{ $title }}</h1>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="content_center comment_create">
            <label>
                <textarea name="comment" placeholder="投稿内容を入力" class="placeholder" rows="10"></textarea>
            </label>
        </div>
        <div class="content_center">
            <input type="submit" class="button" value="投稿">
        </div>
    </form>
@endsection
