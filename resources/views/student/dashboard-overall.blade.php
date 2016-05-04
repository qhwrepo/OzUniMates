@extends('dashboard-template')
@section('workspace')

<header class="site-header">
        <h1>个人信息 | <span class="site-header--current">概览</span></h1>
<!--         <aside class="account">GabeN <i class="entypo-user"></i></aside> -->
      </header>
      <section class="workspace">

        <div id="integration-list">
        <div id="ws-avatar">
            @if($user->avatar) <img src="{{$user['avatar']}}">
            @else
            @endif
        </div>
    <ul>
        <li>
            <a>
                <div>
                    <h2>用户名</h2>
                    <span>{{$user->username}}</span>
                </div>
            </a>
        </li>
        <li>
            <a>
                <div>
                    <h2>邮箱</h2>
                    <span>{{$user->email}}</span>
                </div>
            </a>
        </li>
        <li>
            <a>
                <div>
                    <h2>目标院校</h2>
                    <span>@foreach($user->universities as $university)
                    {{$university->name}}
                    @endforeach</span>
                </div>
            </a>
        </li>
        <li>
            <a>
                <div>
                    <h2>专业/学位</h2>
                    <span>@foreach($user->majors as $major)
                    {{$major->name}}
                    @endforeach
                    <br/>
                     @if($user['degree']=='bachelor') 本科
                    @elseif($user['degree']=='master') 硕士
                    @elseif($user['degree']=='phd') 博士
                    @endif</span>
                </div>
            </a>
        </li>

        <li>
            <a>
                <div>
                    <h2>Email是否接受站内信通知</h2>
                    <p>现在的设置：
                      @if($user->notification == 'e') 是
                      @elseif($user->notification == 'n') 否
                      @endif</p>
                    <span>
                      {!! Form::open( [ 'url' => ['/student/notification/update'], 'method' => 'POST', 'id' => 'notification-form' ] ) !!}
                      <input type="hidden" name="frequency">
                      <button onclick="set_notification('e')">是</button>
                      <button onclick="set_notification('n')">否</button>
                      {!! Form::close() !!}
                    </span>
                </div>
            </a>
        </li>

        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>个人简介</h2>
                <span>@if($user->description) {{$user->description}}
                @else 还没有填写 @endif</span>
            </a>

            <div class="detail">
                <div id="right">
                    <div id="sup">
                        <div><span>修改个人简介：<br/>
                        {!! Form::open( [ 'url' => ['/student/description/update'], 'method' => 'POST', 'id' => 'description-form' ] ) !!}
                        <input type="text" name="description" id="description" value="{{$user->description}}"/></span>
                        <input type="submit" id="des-confirm" value="确定">
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </li>

        <!-- a complete usage example -->
<!--         <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>Trayer Engineering</h2>
                <span>Submersible and Padmount Switchgear, Auto-Transfer & SCADA</span>
            </a>

            <div class="detail">
                <div id="left" style="width:15%;float:left;height:100%;">
                    <div id="sup">
                        <img src="http://trayer.com/wp-content/uploads/2013/11/trayer-logo.jpg" width="100%" />
                    </div>
                </div>
                <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                    <div id="sup">
                        <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                            <br />
                            <br /><a href="#">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </li> -->

    </ul>
</div>
      </section>

@endsection
