@extends('layouts.login')

@section('content')

<div class="container1">
    <form action="/search" class="search">
      @csrf
      <input type="text" name="keyword" placeholder="ユーザー名" class="text-box">
      <button type="submit" class="btn search-button">
        <img src="images/search.png" alt="">
      </button>
    </form>
    @if(!empty($keyword))
    <h2>検索ワード：{{ $keyword }}</h2>
    @endif
</div>
@foreach($post as $post)
@if(!($post->username==Auth::user()->username))
<div class="search-user">
  <div class="search-icon">
    @if(Auth::user()->images=="icon1.png")
    <img src="{{ asset('images/icon1.png') }}" alt="">
    @else
    <img src="images/{{ $post->images }}" alt="アイコン">
    @endif
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
