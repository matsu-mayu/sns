@extends('layouts.logged_in')
 
@section('content')
    <h1>{{ $title }}</h1>
        <main class="content_center">
            <article>
                <form method="POST" action="{{ route('posts.update', $post) }}">
                    @csrf
                    @method('patch')
                        <div class="edit_form">
                            <label>
                                <input 
                                    type="text"
                                    name="comment"
                                    class="placeholder"
                                    value="{{ $post->comment }}">
                            </label>
                        </div>
                        <input type="submit" class="button" value="投稿">
                </form>
            </article>
        </main>
@endsection