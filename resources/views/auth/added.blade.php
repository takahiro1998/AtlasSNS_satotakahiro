@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="add">
    <p>{{ session('username') }}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
  </div>
  <div>
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>
  </div>
  <p class="btn btn-danger">
    <a href="/login">ログイン画面へ</a>
  </p>
</div>

@endsection
