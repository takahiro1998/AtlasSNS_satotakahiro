@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

{{ Form::label('username') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('mail address') }}
{{ Form::text('mail',null,['class' => 'input']) }}

<div class="pass">
  {{ Form::label('password') }}
  {{ Form::password('password',null,['class' => 'input']) }}
</div>

<div class="pass">
  {{ Form::label('password confirm') }}
  {{ Form::password('password_confirmation',null,['class' => 'input']) }}
</div>

{{ Form::submit('REGISTER',['class'=>'btn btn-danger']) }}

<div class="login-btn">
  <p><a href="/login">ログイン画面へ戻る</a></p>
</div>

{!! Form::close() !!}


@endsection
