<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="/css/dashboard.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <nav id="site-nav" class="site-nav" role='navigation'>
      <button href="#" id="site-nav--toggle"  class="site-nav--toggle"><i class="entypo-menu"></i>目录</button></button>
      <ul class="site-nav--list">
        <li><a href="#"><i class="entypo-user"></i>概览</a></li>
        <li><a href="#"><i class="entypo-picture"></i>头像</a></li>
        <li><a href="#"><i class="entypo-chat"></i>站内信</a></li>
        <li><a href="#"><i class="entypo-users"></i>历史</a></li>
        <li><a href="#"><i class="entypo-logout"></i>回主页</a></li>
      </ul>
    </nav>
    <div class="wrapper">
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
                    <h2>就读院校</h2>
                    <span>{{$user->university}}</span>
                </div>
            </a>
        </li>
        <li>
            <a>
                <div>
                    <h2>专业/学位</h2>
                    <span>{{$user->major}} {{$user->specilization}} 
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
                    <h2>我能帮助学弟学妹的方面</h2>
                    <span>@foreach($user->tags as $tag)
                    {{$tag->name}} 
                    @endforeach</span>
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
                        {!! Form::open( [ 'url' => ['/consultant/description/update'], 'method' => 'POST', 'id' => 'description-form' ] ) !!}
                        <input type="text" name="description" id="description" value="{{$user->description}}"/></span>
                        <input type="submit" id="des-confirm" value="确定">
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </li>

        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>是否经过认证</h2>
                <span>@if($user['isPro']) 是
                    @elseif(!$user['isPro']) 否
                    @endif</span>
            </a>

            <div class="detail">
                <div id="right">
                    <div id="sup">
                        <div><span>经过认证后，更容易被学弟学妹信赖。<br/>
                        现阶段，请直接发送邮件给站长xuan9230@gmail.com进行认证。</span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="expand">
                <div class="right-arrow">+</div>
                <h2>收到的感谢</h2>
                <span>{{$user->thanks}}次</span>
            </a>

            <div class="detail">
                <div id="right">
                    <div id="sup">
                        <div><span>受帮助的师弟师妹可能会为你点赞喔！<br/>
                        获得的感谢数量将影响你获得的返佣比例。</span>
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
    </div>

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/dashboard.js"></script>
</body>

</html>