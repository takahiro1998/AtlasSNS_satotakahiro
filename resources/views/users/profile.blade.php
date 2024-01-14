@extends('layouts.login')

@section('content')


@foreach($users as $user)
 @if($user->id==Auth::user()->id)
   <div class="profile">
      {!! Form::open(['url'=>'/profile/update','enctype' => 'multipart/form-data','files' => true]) !!}
      @csrf
      {!! Form::hidden('id',Auth::user()->id) !!}
      <div class="information">
          <article class="icon">
            <figure>
              <img src="{{ asset('storage/images/'.Auth::user()->images) }}">
            </figure>
          </article>
          <div class="profile-information">
            <div class="profile-information1">
              {{Form::label('name','user name')}}
              {{Form::text('username',  Auth::user()->username)}}
            </div>
            <div class="profile-information1">
              {{Form::label('mail','mail address')}}
              {{Form::email('email',Auth::user()->mail)}}
            </div>
            <div class="profile-information1">
              {{Form::label('pass','password')}}
              {{ Form::password('password')}}
            </div>
            <div class="profile-information1">
              {{Form::label('pass','password confirm')}}
              {{Form::password('password_confirm')}}
            </div>
            <div class="profile-information1">
              {{Form::label('name','bio')}}
              {{Form::text('bio',Auth::user()->bio)}}
            </div>
            <div class="custom-file">
              {{Form::label('icon','icon image',['class'=>'custom-input-label'])}}
              {{Form::file('images',['class'=>'custom-file'])}}
            </div>
            <div class="update-btn">
              {{ Form::submit('更新',['class'=>'btn btn-danger'])}}
            </div>
          </div>
      </div>
     {{ Form::token() }}
     {!! Form::close() !!}
    </div>
  @else
    <div class="container1">
      <article class="user-icon">
        <figure><img src="{{ asset('storage/images/'. $user->images)}}" alt=""></figure>
      </article>
      <div class="user-information">
        <div class="user-add">
          <div class="user-name">
            <p>name</p>
            <p>{{ $user->username }}</p>
          </div>
          <div class="user-bio">
            <p>bio</p>
            <p>{{$user->bio }}</p>
          </div>
        </div>
        <div class="unfollow-btn">
        @if(auth()->user()->isFollowing($user->id))
         <div class="unfollow-btn1">
          <button type="button"><a href="/unfollow/{{ $user->id }}">フォロー解除</a></button>
         </div>
         @else
         <div class="unfollow-btn2">
          <button type="button"><a href="/follow/{{ $user->id }}">フォローする</a></button>
         </div>
        @endif
        </div>
      </div>
    </div>
    @foreach($posts as $post)
    <div class="follow-user">
      <article class="icon">
        <figure><img src="{{ asset('storage/images/'. $post->user->images)}}" alt=""></figure>
      </article>
      <div class="follow-post">
        <p>{{ $post->user->username }}</p>
        <p>{{ $post->post }}</p>
      </div>
      <div class="follow-post3">
        <p>{{ $post->created_at }}</p>
      </div>
    </div>
    @endforeach
   @endif
@endforeach

@endsection
