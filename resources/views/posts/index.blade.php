@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->
<div class="container">
  <!-- /topに値を送る -->
  <div class="top-icon"><img src="{{ asset('storage/images/'.Auth::user()->images)}}"></div>
  {!! Form::open(['url' => '/top']) !!}
  {{ Form::token() }}
  <div class="form-group">
    {{ Form::input('text','newPost',null,['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください'])}}
  </div>
  <button type="submit" class="post-btn btn"><img src="images/post.png" alt="送信"></button>
  {!! Form::close() !!}
</div>
<div class="user-post">
  @foreach($list as $list)
  <div class="post">
    <article class="icon">
      <figure><img src="{{ asset('storage/images/'.$list->user->images)}}" alt=""></figure>
    </article>
    <div class="follow-post">
      <p class="follow-post1">{{ $list->user->username }}</p>
      <p class="follow-post2">{{ $list->post }}</p>
    </div>
    <div class="follow-post3">
      <p>{{ $list->created_at }}</p>
      @if($list->user_id==Auth::user()->id)
      <div class="post-icon">
        <!-- 投稿の編集ボタン -->
        <a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="images/edit.png" alt="編集"></a>
        <a class="trash" href="/post/{{ $list->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
        <img src="images/trash.png" alt="削除">
        <img src="images/trash-h.png" alt="ホバー時削除">
      </a>
      </div>
      @endif
    </div>
  </div>
  @endforeach
</div>
@endsection
<!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/update" method="post">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
