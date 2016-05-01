@extends('dashboard-template')
@section('workspace')

<header class="site-header">
        <h1>个人信息 | <span class="site-header--current">修改头像</span></h1>
</header>

<div id="modal_avatar">
  <div id="ws-avatar">
      @if($user->avatar) <img src="{{$user['avatar']}}">
      @else <img src="/img/no_avatar_square.jpg">
      @endif
  </div>
  {!! Form::open( [ 'url' => ['/student/avatar/upload'], 'method' => 'POST', 'id' => 'avatar-form', 'files' => true ] ) !!}
  <div class="actions">
      <button class="file-btn">
          <div id="greet_upload">点击重新上传头像图片</div>
          <input type="file" id="upload" value="选择图片" />
      </button>
      <div class="crop">
          <div id="upload-demo"></div>
      </div>
      <div id="result"></div>
  </div>
  <input id="cropped_avatar" type="hidden" name="cropped_avatar">
  <input type="hidden" name="redirect" value="dashboard">
  <a class="modal-submit not-active" id="submit-avatar">确定</a>
  {!! Form::close() !!}
</div>

<script type="text/javascript" src="/js/home/picture-uploader.js"></script>
<script type="text/javascript" src="/js/dist/croppie.min.js"></script>

@endsection
