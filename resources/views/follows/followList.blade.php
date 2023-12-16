@extends('layouts.login')

@section('content')
<div>
  <h1>Follow List</h1>
  <div>
    @foreach($followings as $following)
     <a href=""><img src="{{ asset($following->images) }}" alt=""></a>
    @endforeach
  </div>
</div>
@foreach($posts as $post)
  <tr>
    <td>{{ $post->user->username }}</td>
    <td>{{ $post->post }}</td>
  </tr>
@endforeach
@endsection
