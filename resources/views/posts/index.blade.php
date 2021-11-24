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
                投稿内容：{{ $post->comment }}
            </div>

            <div>
                投稿日時：{{ $post->created_at }}
            </div>
        </li>
    @empty
        <li>投稿がありません</li>
    @endforelse
@endsection