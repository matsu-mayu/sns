@extends('layouts.logged_in')
 
@section('content')
    <h1>{{ $title }}</h1>
    <ul>
    @forelse($posts as $post)
        <li>
            <div>
                投稿者：{{ $post->user->name }}
            </div>
            
            <div>
                投稿内容：{!! nl2br(e($post->comment)) !!}
            </div>

            <div>
                投稿日時：{{ $post->created_at }}
            </div>
            
            [<a href="{{ route('posts.edit', $post) }}">編集</a>]
            <form method="post" class="delete" action="{{ route('posts.destroy', $post) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="削除">
            </form>
        </li>
    @empty
        <li>投稿がありません</li>
    @endforelse
    
    
    
@endsection