@extends('layouts.logged_in')
 
@section('content')
    <h1>{{ $title }}</h1>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div>
            <label>
                投稿：
                <textarea name="comment" rows="5"></textarea>
            </label>
        </div>
        
        <input type="submit" value="投稿">
    </form>
@endsection
