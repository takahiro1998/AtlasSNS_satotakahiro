@extends('layouts.login')

@section('content')

<div class="container1">
    <form action="/search">
      @csrf
      <input type="text" name="keyword" placeholder="ユーザー名">
      <input type="image" src="images/search.png" class="search-button">
    </form>
    @if(!empty($keyword))
    <h2>検索ワード：{{ $keyword }}</h2>
    @endif
</div>
@foreach($post as $post)
@if(!($post->username==Auth::user()->username))
<div class="search-user">
  <div class="search-icon">
    <img src="images/{{ $post->images }}" alt="アイコン">
  </div>
  <div class="search-username">{{ $post->username }}</div>
  @if(auth()->user()->isFollowing($post->id))
  <div class="search-button1">
    <button type="button"><a href="/unfollow/{{ $post->id }}">フォロー解除</a></button>
  </div>
  @else
  <div class="search-button2">
    <button type="button"><a href="/follow/{{ $post->id }}">フォローする</a></button>
  </div>
  @endif
</div>
@endif
@endforeach


@endsection
