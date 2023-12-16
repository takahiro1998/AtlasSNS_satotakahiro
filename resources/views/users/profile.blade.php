@extends('layouts.login')

@section('content')
<div>
  <div>
    {!! Form::open(['url'=>'/profile/update','enctype' => 'multipart/form-data']) !!}
    @csrf
    {!! Form::hidden('id',Auth::user()->id) !!}
    <img src="">
    <div>
      <div>
        {{Form::label('name','user name')}}
        {{Form::text('username',  Auth::user()->username)}}
      </div>
      <div>
        {{Form::label('mail','mail address')}}
        {{Form::email('email',Auth::user()->mail)}}
      </div>
      <div>
        {{Form::label('pass','password')}}
        {{ Form::password('password')}}
      </div>
      <div>
        {{Form::label('pass','password confirm')}}
        {{Form::password('password_confirm')}}
      </div>
      <div>
        {{Form::label('name','bio')}}
        {{Form::text('bio',Auth::user()->bio)}}
      </div>
      <div>
        {{Form::label('icon','icon image')}}
        {{Form::file('images')}}
      </div>
      {{ Form::submit('更新',['class'=>'btn btn-danger'])}}
    {{ Form::token() }}
    {!! Form::close() !!}
    </div>
  </div>
</div>

    <script src="{{ asset('js/script.js') }} "></script>

@endsection
