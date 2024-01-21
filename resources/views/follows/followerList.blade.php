@extends('layouts.login')

@section('content')
<div class="follower-list">
  <div class="container1">
    <div class="follow-title">
      <h1>Follower List</h1>
    </div>
    <div class="follower-list-icon">
    @foreach($followings as $following)
      <ul class="icon">
        <li>
          <a href="/profile/{{ $following->id }}">
            @if(Auth::user()->images=="icon1.png")
            <img src="{{ asset('images/icon1.png') }}" alt="">
            @else
            <img src="{{ asset('storage/images/'. $following->images) }}">
            @endif
          </a>
        </li>
      </ul>
    @endforeach
    </div>
  </div>
  @foreach($posts as $post)
  <div class="follow-user">
    <article class="follow-icon">
      <figure>
        <a href="/profile/{{ $post->user->id }}">
          @if(Auth::user()->images=="icon1.png")
          <img src="{{ asset('images/icon1.png') }}" alt="">
          @else
          <img src="{{ asset('storage/images/'. $post->user->images) }}" alt="">
          @endif
        </a>
      </figure>
    </article>
    <div class="follow-post">
      <p class="follow-post1">{{ $post->user->username }}</p>
      <p class="follow-post2">{{ $post->post }}</p>
    </div>
    <div class="follow-post3">
      <p>{{ $post->created_at }}</p>
    </div>
  </div>
  @endforeach
</div>

@endsection
