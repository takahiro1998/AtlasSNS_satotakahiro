@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<div class="container">
  <!-- /topに値を送る -->
  {!! Form::open(['url' => '/top']) !!}
  {{ Form::token() }}
  <div class="form-group">
    {{ Form::input('text','newPost',null,['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください'])}}
  </div>
  <button type="submit" class="btn btn-success pull-right"><img src="images/post.png" alt="送信"></button>
  {!! Form::close() !!}
</div>
<div>
  @foreach($list as $list)
  <tr>
    <td>{{ $list->user->username }}</td>
    <td>{{ $list->post }}</td>
    <td>{{ $list->created_at }}</td>
    @if($list->user_id==Auth::user()->id)
    <td>
      <div class="content">
        <!-- 投稿の編集ボタン -->
        <a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="" alt="編集"></a>
      </div>
    </td>
    <td>
      <a class="" href="/post/{{ $list->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
      <button type="submit" class="btn btn-danger"><img src="images/trash-h.png" alt="削除"></a>
    </td>
    @endif
  </tr>
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
