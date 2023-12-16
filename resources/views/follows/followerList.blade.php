@extends('layouts.login')

@section('content')
<div>
  <h1>Follower List</h1>
  <div>
    @foreach($followings as $following)
     <a href=""><img src="{{ asset( 'storage/'. Auth::user()->images) }}" alt=""></a>
    @endforeach
  </div>
</div>
@foreach($posts as $post)
  <tr>
    <div class="icon"><a href=""><img src="/images/icon1.png" alt=""></a></div>
    <td>{{ $post->user->username }}</td>
    <td>{{ $post->post }}</td>
  </tr>
@endforeach

@endsection
