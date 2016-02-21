<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>澳联帮 - 注册成功！</title>
    <link href="/css/regis-success.css" rel="stylesheet" media="screen" type="text/css" />
</head>

<body>
<div class="main">
    <h1>欢迎，{{ \Auth::user("student")['username'] }}!</h1>

    <h1>接下来：</h1>
    <div id="hint1" class="hint">1.根据标签与简介，找到合适的师兄/师姐</div>
    <div id="hint2" class="hint">2.点击“拜见师兄/师姐”，获得联系方式</div>
    <div id="hint3" class="hint">3.好了，根据ta的擅长领域，提问吧！</div>

    <div id="hint4" class="hint">在互助的社区里，没有中介费。</div>
    <div id="hint5" class="hint">但是我们鼓励：给帮助你的ta，塞一个红包吧！</div>
    <div id="hint6" class="hint"><a href="/student/home">开始</a></div>
</div>
</body>

</html>