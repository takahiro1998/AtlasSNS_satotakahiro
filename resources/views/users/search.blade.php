@extends('layouts.login')

@section('content')

<div class="container">
  <form action="/search">
    @csrf
    <input type="text" name="keyword">
    <input type="submit">
  </form>
  <h2>検索ワード：{{ $keyword }}</h2>
</div>
<div class="">
  @foreach($post as $post)
  <tr>
    <td class=""><img src="images/{{ $post->images }}" alt="アイコン"></td>
    <td>{{ $post->username }}</td>
    @if(auth()->user()->isFollowing($post->id))
    <td>
      <button type="button"><a href="/unfollow/{{ $post->id }}">フォロー解除</a></button>
    </td>
    @else
    <td>
      <button type="button"><a href="/follow/{{ $post->id }}">フォローする</a></button>
    </td>
    @endif
  </tr>
  @endforeach
</div>

@endsection
