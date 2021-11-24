@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <dl>
      <dt>
        投稿：
      </dt>
        <dd>
          {{ $post->comment }}
        </dd>
  </dl>
@endsection