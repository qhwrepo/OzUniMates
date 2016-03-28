<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>澳联帮 - 个人信息</title>
    <link href="/css/dashboard.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <nav id="site-nav" class="site-nav" role='navigation'>
      <button href="#" id="site-nav--toggle"  class="site-nav--toggle"><i class="entypo-menu"></i>目录</button></button>
      <ul class="site-nav--list">
        <li><a href="overall"><i class="entypo-user"></i>概览</a></li>
        <li><a href="avatar"><i class="entypo-picture"></i>头像</a></li>
        <li><a href="case"><i class="entypo-users"></i>历史</a></li>
        <li><a href="../home"><i class="entypo-logout"></i>回主页</a></li>
      </ul>
    </nav>
    <div class="wrapper">
      
    @yield('workspace')

    </div>

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/dashboard.js"></script>
</body>

</html>